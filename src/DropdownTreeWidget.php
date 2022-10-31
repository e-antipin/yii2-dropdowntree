<?php
namespace antimail\dropdowntree;

use yii\helpers\Json;
use yii\web\View;
use yii\widgets\InputWidget;
use yii\helpers\Html;

class DropdownTreeWidget extends InputWidget
{

    public $options = ['class' => 'form-control'];
    public $items = [];


    public function init()
    {
        parent::init();
        //$this->options['id'] = uniqid();
        //Html::addCssClass($this->options, ['widget' => 'dropdown-tree']);
    }
    public function run()
    {
        $this->registerClientScript();

        $this->items = $this->generateTree($this->items);

        if ($this->hasModel()) {
            $this->value =Html::getAttributeValue($this->model, $this->attribute);
        }

        $this->initJSTree($this->items);

        if ($this->hasModel()) {
            return '<div class="treeselect">' . Html::activeHiddenInput($this->model, $this->attribute, $this->options) . '</div>';
        } else {
            return '<div class="treeselect">' . Html::hiddenInput($this->name, $this->value, $this->options) . '</div>';
        }
    }

    protected function registerClientScript()
    {
        $view = $this->getView();
        DropdownTreeAsset::register($view);
    }

    protected function initJSTree($items) {
        $view = $this->view;
        $id = $this->options['id'];
        $view->registerJs("
            document.addEventListener('DOMContentLoaded', function(){
                const options = " . Json::encode($this->items) . "
                const domElement = document.querySelector('.treeselect')
                
                    const treeselect = new window.treeVar({
                    parentHtmlContainer: domElement,
                    value: '" . $this->value /* ($this->value === null ? '[]' : Json::encode($this->value)) */ . "',
                    options: options,
                    //showTags: false,
                    //grouped: false,
                    isSingleSelect: true,
                    //disabledBranchNode: true,
                    isGroupedValue:true,
                    //listSlotHtmlComponent: slot,
                    //alwaysOpen: true
                })
                treeselect.srcElement.addEventListener('input', (e) => {
                  document.getElementById('" . $this->options['id'] . "').value = e.detail; 
                })
            });
        ", View::POS_END);
    }

    protected function renderItems($items, $options = [])
    {

    }

    protected function generateTree(&$source, $parentId = null){
        $tree = [];
        foreach ($source as $item) {
            $item['parent_id'] = $item['parent_id'] ?? null;
            if ($item['parent_id'] == $parentId) {
                $item['children'] = $this->generateTree($source, $item['id']);
                $item['value'] = $item['id'];
                $tree[] = $item;
            }
        }
        return $tree;
    }

}
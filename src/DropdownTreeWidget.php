<?php
namespace antimail\dropdowntree;

use yii\widgets\InputWidget;
use yii\helpers\Html;

class DropdownTreeWidget extends InputWidget
{

    public $options = ['class' => 'form-control'];
    public $items = [];


    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, ['widget' => 'dropdown-tree']);
    }
    public function run()
    {

        $this->registerClientScript();

        if ($this->hasModel()) {
            $this->value = Html::getAttributeValue($this->model, $this->attribute);
        }

        return $this->renderItems($this->items, $this->options);
        /*
        if ($this->hasModel()) {
            echo Html::activeHiddenInput($this->model, $this->attribute, $this->options);
        } else {
            echo Html::hiddenInput($this->name, $this->value, $this->options);
        }
        */
    }

    protected function registerClientScript()
    {
        $view = $this->getView();
        DropdownTreeAsset::register($view);
        $view->registerJs("");
    }

    protected function renderItems($items, $options = [])
    {

    }
}
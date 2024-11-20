<?php
namespace e-antipin\dropdowntree;

use yii\web\AssetBundle;

class DropdownTreeAsset extends AssetBundle
{
    public $sourcePath = '@vendor/e-antipin/yii2-dropdown-tree/src/assets';

    public $js = [
        ['js/treeselectjs.mjs.js', 'type'=>'module'],
        ['js/app.js', 'type'=>'module'],
    ];

    public $css = [
        'css/treeselectjs.css',
    ];
    public $depends = [
        //'e-antipin\dropdowntree\TreeSelectAsset'
    ];
}

<?php
namespace antimail\dropdowntree;

use yii\web\AssetBundle;

class DropdownTreeAsset extends AssetBundle
{
    public $sourcePath = '@vendor/antimail/yii2-dropdown-tree/src/assets';

    public $js = [
        ['js/treeselectjs.mjs.js', 'type'=>'module'],
        ['js/app.js', 'type'=>'module'],
    ];

    public $css = [
        'css/treeselectjs.css',
    ];
    public $depends = [
        //'antimail\dropdowntree\TreeSelectAsset'
    ];
}
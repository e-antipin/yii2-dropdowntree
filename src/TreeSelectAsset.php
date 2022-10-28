<?php
namespace antimail\dropdowntree;

use yii\web\AssetBundle;

class TreeSelectAsset extends AssetBundle
{
    public $sourcePath ='@vendor/npm-asset/treeselectjs/dist';

    public $js = [
        ['treeselectjs.mjs.js', 'type'=>'module'],
        //['treeselectjs.cjs.js'],
        //'treeselectjs.cjs.js'
    ];

    public $css = [
        'treeselectjs.css',
    ];

    public function publish($am)
    {
        parent::publish($am);
        $js = $this->baseUrl . 'treeselectjs.mjs.js';
    }
}
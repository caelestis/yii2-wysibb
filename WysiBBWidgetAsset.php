<?php
namespace kalyabin\wysibb;

use yii\web\AssetBundle;

/**
 * WysiBBWidgetAsset
 *
 * Register required JavaScript and CSS files
 *
 * @author Max Kalyabin <maksim@kalyabin.ru>
 */
class WysiBBWidgetAsset extends AssetBundle
{
    public $sourcePath = '@bower/jqjquery-wysibb';
    public $css = [
        'theme/default/wbbtheme.css',
    ];
    public $js = [
        'jquery.wysibb.min.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
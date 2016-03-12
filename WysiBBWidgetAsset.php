<?php
namespace kalyabin\wysibb;

use Yii;
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

    /**
     * Append language support.
     *
     * @param string $code Language short code
     */
    public function appendLanguage($code)
    {
        $langJs = 'lang/' . strtolower(substr($code, 0, 2)) . '.js';
        $absolutePath = Yii::getAlias($this->sourcePath . '/' . $langJs);
        if (is_file($absolutePath) && !in_array($langJs, $this->js)) {
            $this->js[] = $langJs;
        }
    }
}

<?php
namespace kalyabin\wysibb;

use kalyabin\wysibb\WysiBBWidgetAsset;
use Yii;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\widgets\InputWidget;

/**
 * Implements WysiBB editor to application by basic yii2 widget.
 *
 * @author Max Kalyabin <maksim@kalyabin.ru>
 */
class WysiBBWidget extends InputWidget
{
    /**
     * Short language code.
     * Yii::$app->language by default.
     *
     * @see https://github.com/wbb/WysiBB#language
     *
     * @var string
     */
    public $language;

    /**
     * @var array wisybb.js options
     */
    public $clientOptions = [];

    /**
     * @var array options for html textarea
     */
    public $inputOptions = ['class' => 'form-control'];

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->language = !empty($this->language) ? $this->language : Yii::$app->language;
        if (!isset($this->clientOptions['lang'])) {
            $this->clientOptions['lang'] = $this->language;
        }

        return parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        print $this->hasModel()
            ? Html::activeTextarea($this->model, $this->attribute, $this->inputOptions)
            : Html::textarea($this->name, $this->value, $this->inputOptions);
        $this->registerClientScript();
    }

    /**
     * JavaScript registration
     */
    public function registerClientScript()
    {
        WysiBBWidgetAsset::register($this->view)->appendLanguage($this->language);
        $clientOptions = Json::encode($this->clientOptions);
        $this->view->registerJs(new JsExpression("jQuery('#{$this->options['id']}').wysibb($clientOptions);"));
    }
}

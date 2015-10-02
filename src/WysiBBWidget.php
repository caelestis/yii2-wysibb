<?php
namespace kalyabin\wysibb;

use kalyabin\wysibb\WysiBBWidgetAsset;
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
        WysiBBWidgetAsset::register($this->view);
        $clientOptions = Json::encode($this->clientOptions);
        $this->view->registerJs(new JsExpression("jQuery('#{$this->options['id']}').wysibb($clientOptions);"));
    }
}
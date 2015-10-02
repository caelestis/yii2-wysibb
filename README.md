# yii2-wysibb
Implements WysiBB visual editor http://www.wysibb.com/ to your Yii2 application.
More about WysiBB read at http://www.wysibb.com/

## Install via composer

Run in your console:

```bash
php composer.phar global require "fxp/composer-asset-plugin:1.0.0"
php composer.phar require "kalyabin/wysibb" "*"
```

## Basic usage

```php
/* @var $this \yii\web\View */
/* @var $model \yii\base\Model */
$form = \yii\widgets\ActiveForm::begin();
print $form->field($model, 'content')->widget(\kalyabin\wysibb\WysiBBWidget::className(), [
...
]);
\yii\widgets\ActiveForm::end();
```

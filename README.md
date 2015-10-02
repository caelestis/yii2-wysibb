# yii2-wysibb
Implements WysiBB visual editor http://www.wysibb.com/ to your Yii2 application.
More about WysiBB read at http://www.wysibb.com/


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

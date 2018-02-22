<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PromoPictures */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promo-pictures-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'promo_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'promo_day')->textInput() ?>

    <?= $form->field($model, 'promo_way')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'promo_telegram_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

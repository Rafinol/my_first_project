<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\PromoPictures */

$this->title = 'Обновить промоакцию: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Promo Pictures', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->promo_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="promo-pictures-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <div class="promo-pictures-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'promo_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'promo_day')->textInput() ?>

        <img src="<?=\yii\helpers\Url::home(true).$model->getImageFileUrl('promo_way');?>" alt="" width="300">

        <?= $form->field($model, 'promo_way')->fileInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>


        <?php ActiveForm::end(); ?>

    </div>

</div>

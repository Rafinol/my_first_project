<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PromoPictures */

$this->title = 'Создать Промоакцию';
$this->params['breadcrumbs'][] = ['label' => 'Promo Pictures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promo-pictures-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <div class="promo-pictures-form">

        <?php $form = ActiveForm::begin([
                    'enableClientValidation' => false,
                    'options' => [
                        'enctype' => 'multipart/form-data',
                    ],
                ]);
        ?>

        <?= $form->field($model, 'promo_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'promo_day')->textInput() ?>

        <?= $form->field($model, 'promo_way')->fileInput()?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>


        <?php ActiveForm::end(); ?>

    </div>

</div>

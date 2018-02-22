<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PromoPictures */

$this->title = $model->promo_name;
$this->params['breadcrumbs'][] = ['label' => 'Promo Pictures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promo-pictures-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'promo_name',
            'promo_day',
            'promo_telegram_id',
        ],
    ]) ?>
    <img src="<?=\yii\helpers\Url::home(true).$model->getImageFileUrl('promo_way');?>" alt="" width="300">

</div>

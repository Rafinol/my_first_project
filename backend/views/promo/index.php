<h1>Промоакции</h1><br>
<?php foreach ($promos as $day => $promoaction):?>
    <div class="promo">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= $day?></h3>
                    </div>
                    <br>
                    <div class="box-body">
                        <?foreach ($promoaction as $key => $promo):?>
                            <div style="border-bottom:1px solid #f4f4f4; padding-bottom:10px;">
                                <b><?=$key+1?>. </b>
                                <a href="<?=\yii\helpers\Url::home().'/promo/view?id='.$promo->id?>"><?=$promo->promo_name?></a>
                            </div>
                        <?endforeach;?><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?endforeach;?>
<a class="btn btn-success" href="<?=\yii\helpers\Url::home().'/promo/create'?>">Создать промоакцию</a>


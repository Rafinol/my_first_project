<?php

namespace app\models;

use backend\services\helpers\DateHelper;
use Yii;

/**
 * This is the model class for table "promo_pictures".
 *
 * @property int $id
 * @property string $promo_name
 * @property int $promo_day
 * @property string $promo_way
 * @property int $promo_telegram_id
 */
class PromoPictures extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => 'app\services\CustomImageUpload',
                'attribute' => 'promo_way',
                'thumbs' => [
                    'thumb' => ['width' => 400, 'height' => 300],
                ],
                'filePath' => '@webroot/images/[[pk]].[[extension]]',
                'fileUrl' => '/images/[[pk]].[[extension]]',/*
                'thumbPath' => '@webroot/images/[[profile]]_[[pk]].[[extension]]',
                'thumbUrl' => '/images/[[profile]]_[[pk]].[[extension]]',*/
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promo_pictures';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['promo_day'], 'integer'],
            [['promo_name','promo_telegram_id'], 'string', 'max' => 255],
            ['promo_way', 'file', 'extensions' => 'jpeg, gif, png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'promo_name' => 'Описание',
            'promo_day' => 'День недели (1 - понедельник, 7 - воскресенье)',
            'promo_way' => 'Путь до файла',
            'promo_telegram_id' => 'Telegram ID',
        ];
    }

    public static function getCurrentPromo()
    {
        $weekday = DateHelper::getWeekDay();
        return self::find()->select(['promo_telegram_id','promo_name'])->where(['promo_day'=>$weekday])->one() ?? [];
    }

    public static function getCurrentPromoImage()
    {
        $weekday = DateHelper::getWeekDay();
        return (self::find()->select(['promo_telegram_id'])->where(['promo_day'=>$weekday])->one())->promo_telegram_id ?? [];
    }

    public static function getGroupPromo()
    {
        $promos = self::find()->orderBy(['promo_day'=>SORT_ASC])->all();
        $group_promo = [];
        foreach ($promos as $promo){
            $group_promo[DateHelper::getStringWeekDay($promo->promo_day)][] = $promo;
        }

        return $group_promo;
    }

    public function updateTelegramId($id)
    {
        $this->promo_way=null;
        $this->promo_telegram_id = $id;

        $this->save();
        if(!$this->save())
            Yii::warning(print_r($this->getErrors(),true));
    }
}

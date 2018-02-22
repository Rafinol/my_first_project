<?php
/**
 * Created by PhpStorm.
 * User: Web2
 * Date: 22.02.2018
 * Time: 15:05
 */

namespace app\services;


use yiidreamteam\upload\ImageUploadBehavior;

class CustomImageUpload extends ImageUploadBehavior
{
    public function afterFileSave()
    {
        parent::afterFileSave();
        //\Yii::warning(print_r($this,true),'ffffffff');
        $tlgrm = new Tlgrm();
        $tlgrm->sendMeFile($this->owner->id);
    }
}
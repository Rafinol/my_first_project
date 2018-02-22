<?php
namespace app\services;

use app\models\PromoPictures;
use app\models\Settings;
use Longman\TelegramBot\Commands\UserCommands\SendphotoCommand;
use Longman\TelegramBot\Request;
use Longman\TelegramBot\Telegram;
use yii\helpers\Url;

class Tlgrm
{
    public $telegram;

    public function __construct()
    {
        $settings = Settings::getSettings();
        $this->telegram = isset($settings->token) ? new Telegram($settings->token, $settings->bot_name) : [];
    }
    public function sendMeFile($file_id)
    {
        $file = PromoPictures::findOne($file_id);
        //\Yii::warning(print_r($file,true),'qqq');
        $data = [
            'chat_id' => Settings::getNotifiedUser(),
            'photo'   =>  Url::home('https').$file->getImageFileUrl('promo_way')//\Yii::$app->basePath.'/web/images/'.$file->promo_way,
        ];
        //\Yii::warning(print_r(Url::home(true).$file->getImageFileUrl('promo_way'),true),'sssss');
        $telegram_id = Request::sendPhoto($data);

        $file->updateTelegramId($telegram_id->result->photo[1]['file_id']);
    }
}
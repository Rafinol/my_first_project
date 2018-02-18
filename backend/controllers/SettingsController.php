<?php
/**
 * Created by PhpStorm.
 * User: kam2r
 * Date: 17.02.2018
 * Time: 22:11
 */

namespace backend\controllers;

use app\models\Settings;
use app\services\Tlgrm;
use Longman\TelegramBot\Telegram;
use yii\helpers\Url;
use yii\web\Controller;

class SettingsController extends Controller
{

    private $telegram;
    private $settings;
    
    public function beforeAction()
    {
        $this->settings = Settings::getSettings();
        $this->telegram = new Telegram($this->settings->token, $this->settings->bot_name);
    }
    
    public function actionIndex()
    {
        $form = new SettingsForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate() && $form->token != $this->settings->token) {
            $tlgrm = new Tlgrm($this->settings->token);
            if ($tlgrm->getMe()) {
                $result = $this->telegram->setWebhook(Url::home(true).$this->settings->webhook);
                if ($result->isOk())
                    echo $result->getDescription();
            }
        }
        else{
            $form = $this->settings;
        }

        return $this->render('index', [
            'model' => $form,
        ]);
    }

    public function actionHook()
    {
        $this->telegram->handle();
    }
}
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
use backend\forms\SettingsForm;
use Longman\TelegramBot\Telegram;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class SettingsController extends Controller
{

    private $telegram;
    private $settings;
    
    public function beforeAction($action)
    {

        $this->settings = Settings::getSettings();
        $this->telegram = isset($this->settings->token) ? new Telegram($this->settings->token, $this->settings->bot_name) : [];
        parent::beforeAction($action);
        return true;
    }
    
    public function actionIndex()
    {
        $form = new SettingsForm();
        $form->load($this->settings);
        if ($form->load(Yii::$app->request->post()) && $form->validate() && $form->token != $this->settings->token) {
            $tlgrm = new Tlgrm($form->token);
            if ($tlgrm->getMe()) {
                $this->telegram = new Telegram($form->token, $form->bot_name);
                $result = $this->telegram->setWebhook(Url::home('https').'admin/'.$form->webhook);
                if ($result->isOk()){
                    $this->settings->token = $form->token;
                    $this->settings->bot_name = $form->bot_name;
                    $this->settings->webhook = $form->webhook;
                    $this->settings->account = $form->account;

                    if(!$this->settings->save()){
                        print_r($this->settings->errorMsg());
                    }
                }
                else{
                    echo $result->getDescription();//Отправим нотификацию
                }

            }
        }

        return $this->render('index', [
            'model' => $form,
        ]);
    }

    public function actionHook()
    {
        $commands_paths = [
            YiiBase::getPathOfAlias('backend').'/Commands',
        ];
        $this->telegram->addCommandsPaths($commands_paths);
        $this->telegram->handle();
    }
}
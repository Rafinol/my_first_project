<?php
namespace backend\forms;

use yii\base\Model;

class SettingsForm extends Model
{
    public $token;
    public $bot_name;
    public $webhook;
    public $account;

    public function rules()
    {
        return [
            [['token','bot_name','webhook','account'],'required']
        ];
    }

}
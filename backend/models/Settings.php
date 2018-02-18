<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property string $token
 * @property string $bot_name
 * @property string $webhook
 * @property string $account
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['token', 'bot_name', 'webhook', 'account'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'token' => 'Token',
            'bot_name' => 'Bot Name',
            'webhook' => 'Webhook',
            'account' => 'Account',
        ];
    }

    public static function getSettings()
    {
        $settings = self::find()->limit(1)->one();
        return !empty($settings) ? $settings : new self();
    }

    public static function getToken()
    {
        return self::getSettings()->token;
    }

    public static function getBotName()
    {
        return self::getSettings()->bot_name;
    }

    public static function getNotifiedUser()
    {
        return self::getSettings()->account;
    }
}

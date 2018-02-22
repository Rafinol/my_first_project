<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_message_log".
 *
 * @property int $id
 * @property int $message_timestamp
 * @property string $message_name
 * @property string $message_text
 * @property int $author_id
 */
class InMessageLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_message_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message_timestamp'], 'integer'],
            [['message_name', 'message_text', 'author_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message_timestamp' => 'Message Timestamp',
            'message_name' => 'Message Name',
            'message_text' => 'Message Text',
            'author_id' => 'Author ID',
        ];
    }

    public static function create($user,$name, $text)
    {
        $log = new self();
        $log->message_timestamp = time();
        $log->message_name = $name;
        $log->message_text = $text;
        $log->author_id = $user;

        if(!$log->save())
            Yii::warning(print_r($log->getErrors(),true));
    }
}

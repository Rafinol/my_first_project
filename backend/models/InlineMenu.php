<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inline_menu".
 *
 * @property int $id
 * @property int $menu_id
 * @property int $inline_id
 */
class InlineMenu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inline_menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['menu_id', 'inline_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'menu_id' => 'Menu ID',
            'inline_id' => 'Inline ID',
        ];
    }

    public function geInline()
    {
        return $this->hasOne(Inline::className(), ['inline_id' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inline".
 *
 * @property int $id
 * @property string $name
 * @property string $button
 * @property int $menu_id
 */
class Inline extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inline';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['menu_id'], 'integer'],
            [['name', 'button'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'button' => 'Button',
            'menu_id' => 'Menu ID',
        ];
    }

    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['id' => 'menu_id']);
    }

    public function getInlineMenu()
    {
        return $this->hasMany(InlineMenu::className(), ['menu_id' => 'menu_id']);
    }

    public static function getByName($name)
    {
        return self::find()->where(['name'=>$name])->one();
    }

}

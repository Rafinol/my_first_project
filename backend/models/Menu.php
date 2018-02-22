<?php
/**
 * Created by PhpStorm.
 * User: Web2
 * Date: 20.02.2018
 * Time: 15:20
 */

namespace app\models;




class Menu extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['description'], 'text'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'description' => 'Описание',
        ];
    }

    public function getInlineMenu()
    {
        return $this->hasMany(InlineMenu::className(), ['menu_id' => 'id']);
    }

    public function getInline()
    {
        return $this->hasMany(Inline::className(), ['id' => 'inline_id'])->viaTable('inline_menu', ['menu_id' => 'id']);
    }

    public function getDescription($user)
    {
        return $this->description;
    }


    public static function getByName($name)
    {
        return self::find()->where(['name'=>$name])->one();
    }

    public static function getAllMenu()
    {
        return self::findAll();
    }
}
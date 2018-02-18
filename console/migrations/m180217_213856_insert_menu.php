<?php

class m180217_213856_insert_menu extends \yii\db\Migration
{
    public function up()
    {
        $this->insert('menu',array(
            'name'=>'start',
            'description'=>'Привет, меня зовут уникальный бот. Воспользуйтесь командами ниже, чтобы взаимодействовать со мной. ',
        ));
        $this->insert('menu',array(
            'name'=>'main',
            'description'=>'Это основные команды, которыми можно мною управлять.',
        ));
        $this->insert('menu',array(
            'name'=>'hello',
            'description'=>'Привет, %username%',
        ));
        $this->insert('menu',array(
            'name'=>'echo',
            'description'=>'Сегодня %datetime%',
        ));
        $this->insert('menu',array(
            'name'=>'promo',
        ));


    }

    public function down()
    {
        echo "m180217_2138_insert_menu does not support migration down.\n";
        return false;
    }
}
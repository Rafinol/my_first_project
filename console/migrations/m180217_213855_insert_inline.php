<?php

use yii\db\Migration;

class m180217_213855_insert_inline extends Migration
{
    public function up()
    {
        $this->insert('inline',array(
            'name'=>'start',
            'menu_id'=>'1',
        ));
        $this->insert('inline',array(
            'name'=>'hello',
            'button'=>'inline-hello',
            'menu_id'=>'2',
        ));
        $this->insert('inline',array(
            'name'=>'echo',
            'button'=>'inline-echo',
            'menu_id'=>'2',
        ));
        $this->insert('inline',array(
            'name'=>'promo',
            'button'=>'inline-promo',
            'menu_id'=>'2',
        ));
        $this->insert('inline',array(
            'name'=>'back',
            'button'=>'inline-back',
            'menu_id'=>'2',
        ));

    }

    public function down()
    {
        echo "m180217_2138_insert_inline does not support migration down.\n";
        return false;
    }

}
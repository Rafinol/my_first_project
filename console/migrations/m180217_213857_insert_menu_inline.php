<?php

class m180217_213857_insert_menu_inline extends \yii\db\Migration
{
    public function up()
    {
        $this->insert('inline_menu',array(
            'menu_id'=>1,
            'inline_id'=>2,
        ));
        $this->insert('inline_menu',array(
            'menu_id'=>1,
            'inline_id'=>3,
        ));
        $this->insert('inline_menu',array(
            'menu_id'=>1,
            'inline_id'=>4,
        ));

        $this->insert('inline_menu',array(
            'menu_id'=>2,
            'inline_id'=>2,
        ));
        $this->insert('inline_menu',array(
            'menu_id'=>2,
            'inline_id'=>3,
        ));
        $this->insert('inline_menu',array(
            'menu_id'=>2,
            'inline_id'=>4,
        ));
        $this->insert('inline_menu',array(
            'menu_id'=>3,
            'inline_id'=>5,
        ));
        $this->insert('inline_menu',array(
            'menu_id'=>4,
            'inline_id'=>5,
        ));
        $this->insert('inline_menu',array(
            'menu_id'=>5,
            'inline_id'=>5,
        ));

    }

    public function down()
    {
        echo "m180217_213857_insert_menu_inline does not support migration down.\n";
        return false;
    }
}
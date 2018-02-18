<?php

use yii\db\Migration;

/**
 * Handles the creation of table `inline`.
 */
class m180217_175231_create_inline_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('inline', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'button' => $this->string()->null(),
            'menu_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('inline');
    }
}

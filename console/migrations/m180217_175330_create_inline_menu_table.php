<?php

use yii\db\Migration;

/**
 * Handles the creation of table `inline_menu`.
 */
class m180217_175330_create_inline_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('inline_menu', [
            'id' => $this->primaryKey(),
            'menu_id' => $this->integer(),
            'inline_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('inline_menu');
    }
}

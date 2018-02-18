<?php

use yii\db\Migration;

/**
 * Handles the creation of table `menu`.
 */
class m180217_175200_create_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('menu', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->text()->append('CHARACTER SET utf8 COLLATE utf8_unicode_ci'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('menu');
    }
}

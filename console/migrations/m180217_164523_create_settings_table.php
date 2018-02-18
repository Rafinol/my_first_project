<?php

use yii\db\Migration;

/**
 * Handles the creation of table `settings`.
 */
class m180217_164523_create_settings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('settings', [
            'id' => $this->primaryKey(),
            'token' => $this->string(),
            'bot_name' => $this->string(),
            'webhook' => $this->string(),
            'account' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('settings');
    }
}

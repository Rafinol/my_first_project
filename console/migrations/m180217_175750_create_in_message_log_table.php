<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_message_log`.
 */
class m180217_175750_create_in_message_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_message_log', [
            'id' => $this->primaryKey(),
            'message_timestamp' => $this->integer(),
            'message_name' => $this->string(),
            'message_text' => $this->string(),
            'author_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_message_log');
    }
}

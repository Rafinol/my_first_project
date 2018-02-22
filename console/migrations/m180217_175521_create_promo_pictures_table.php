<?php

use yii\db\Migration;

/**
 * Handles the creation of table `promo_pictures`.
 */
class m180217_175521_create_promo_pictures_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('promo_pictures', [
            'id' => $this->primaryKey(),
            'promo_name' => $this->string(),
            'promo_day' => $this->integer(),
            'promo_way' => $this->string(),
            'promo_telegram_id' => $this->string()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('promo_pictures');
    }
}

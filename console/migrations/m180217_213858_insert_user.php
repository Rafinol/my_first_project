<?php
class m180217_213858_insert_user extends \yii\db\Migration
{
    public function up()
    {
        $this->insert('user',array(
            'username'=>'admin',
            'email'=>'admin@admin.ru',
            'password_hash'=>Yii::$app->security->generatePasswordHash('admin', 8),
            'auth_key'=>rand(8,8),
            'confirmed_at'=>time(),
            'registration_ip'=>'127.0.0.1',
            'created_at'=>time(),
            'updated_at'=>time(),
            'flags'=>0,
        ));
        $this->insert('profile',array(
            'user_id'=>1,
            'name'=>'Админ',
        ));
    }

    public function down()
    {
        echo "m180217_213858_insert_user does not support migration down.\n";
        return false;
    }
}
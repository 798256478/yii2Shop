<?php

use yii\db\Migration;

/**
 * Handles the creation of table `admins`.
 */
class m161220_015750_create_admins_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('admins', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'logintime' => $this->timestamp(),
            'loginip' => $this->string(),
            'create_at' => $this->timestamp(),
        ]);

        $this->insert('admins', [
            'username' => 'admin',
            'password' => md5('admin'),
            'email' => '798256478@qq.com',
            'create_at' => date("Y-m-d H:i:s"),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->delete('admins', ['id' => 1]);
        $this->dropTable('admins');
    }
}

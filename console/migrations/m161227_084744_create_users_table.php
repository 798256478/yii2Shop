<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m161227_084744_create_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->defaultValue('')->comment('用户名'),
            'password' => $this->string()->notNull()->defaultValue('')->comment('密码'),
            'mail' => $this->string()->notNull()->defaultValue('')->comment('邮箱'),
            'createtime' => $this->timestamp()->notNull()->comment('创建时间'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_profile`.
 */
class m161227_085709_create_user_profile_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('user_profile', [
            'id' => $this->primaryKey(),
            'truename' => $this->string()->comment('真实姓名'),
            'age' => $this->integer()->comment('年龄'),
            'sex' => 'enum("0", "1", "2") default "0" comment "性别"',
            'nickname' => $this->string()->comment('昵称'),
            'userid' => $this->integer()->comment('用户id'),
            'createtime' => $this->timestamp()->comment('创建时间'),
        ]);

        $this->createIndex(
            'idx-user_profile-userid',
            'user_profile',
            'userid');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-user_profile-userid',
            'user_profile');
        $this->dropTable('user_profile');
    }
}

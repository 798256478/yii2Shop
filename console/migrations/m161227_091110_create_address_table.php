<?php

use yii\db\Migration;

/**
 * Handles the creation of table `address`.
 */
class m161227_091110_create_address_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('address', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->defaultValue('')->comment('姓名'),
            'address' => $this->text()->comment('地址'),
            'postcode' => $this->string()->notNull()->defaultValue('')->comment('邮编'),
            'telephone' => $this->string()->notNull()->defaultValue('')->comment('手机号码'),
            'userid' => $this->integer()->notNull()->defaultValue('0')->comment('用户id'),
            'createtime' => $this->integer()->notNull()->comment('创建时间'),
        ]);

        $this->createIndex(
            'idx-address-userid',
            'address',
            'userid');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropIndex(
            'idx-address-userid',
            'address');

        $this->dropTable('address');
    }
}

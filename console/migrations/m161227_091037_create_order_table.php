<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m161227_091037_create_order_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'userid' => $this->integer()->notNull()->defaultValue('0')->comment('用户id'),
            'addressid' => $this->integer()->notNull()->defaultValue('0')->comment('地址id'),
            'amount' => $this->double()->notNull()->defaultValue('0.00')->comment('商品数量'),
            'status' => $this->integer()->notNull()->defaultValue('0')->comment('订单状态'),
            'expressid' => $this->integer()->notNull()->defaultValue('0')->comment('快递id'),
            'expressnum' => $this->string()->notNull()->defaultValue('')->comment('快递编号'),
            'tradenum' => $this->string()->notNull()->defaultValue('')->comment('交易单号'),
            'tradetext' => $this->text()->comment('交易信息'),
            'createtime' => $this->timestamp()->comment('创建时间'),
        ]);

        $this->createIndex(
            'idx-order-userid',
            'order',
            'userid');

        $this->createIndex(
            'idx-order-addressid',
            'order',
            'addressid');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropIndex(
            'idx-order-userid',
            'order'
            );

        $this->dropIndex(
            'idx-order-addressid',
            'order'
            );
        
        $this->dropTable('order');
    }
}

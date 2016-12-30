<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order_detail`.
 */
class m161227_091053_create_order_detail_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order_detail', [
            'id' => $this->primaryKey(),
            'productid' => $this->integer()->notNull()->defaultValue('0')->comment('商品id'),
            'price' => $this->double()->notNull()->defaultValue('0.00')->comment('商品价格'),
            'productnum' => $this->integer()->notNull()->defaultValue('0')->comment('商品数量'),
            'orderid' => $this->integer()->notNull()->defaultValue('0')->comment('订单id'),
            'createtime' => $this->integer()->notNull()->comment('创建时间'),
        ]);

        $this->createIndex(
            'idx-order_detail-productid',
            'order_detail',
            'productid');

        $this->createIndex(
            'idx-order_detail-orderid',
            'order_detail',
            'orderid');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropIndex(
            'idx-order_detail-productid',
            'order_detail');

        $this->dropIndex(
            'idx-order_detail-orderid',
            'order_detail');
        
        $this->dropTable('order_detail');
    }
}

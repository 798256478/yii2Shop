<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cart`.
 */
class m161227_082940_create_cart_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('cart', [
            'id' => $this->primaryKey(),
            'productid' => $this->bigInteger()->notNull()->defaultValue('0')->comment('商品id'),
            'productnum' => $this->integer()->notNull()->defaultValue('0')->comment('商品数量'),
            'userid' => $this->integer()->notNull()->defaultValue('0')->comment('用户id'),
            'createtime' => $this->timestamp()->notNull()->comment('创建时间'), 
        ]);

        $this->createIndex(
            'idx-cart-user_id',
            'cart',
            'userid');
        $this->createIndex(
            'idx-cart-product_id',
            'cart', 
            'productid'
            );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-cart-product_id',
            'cart');
        $this->dropIndex(
            'idx-cart-user_id',
            'cart');
        $this->dropTable('cart');
    }
}

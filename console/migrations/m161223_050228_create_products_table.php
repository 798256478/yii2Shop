<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products`.
 */
class m161223_050228_create_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'cate_id' => $this->integer()->notNull()->comment('所属类id'),
            'name' => $this->string()->notNull()->comment('商品名称'),
            'cover' => $this->string()->notNull()->comment('商品封面图片'),
            'price' => $this->string()->notNull()->comment('商品价格'),
            'image' => $this->string()->notNull()->comment('商品图片'),
            'intro' => $this->text()->comment('商品描述'),
            'num' => $this->integer()->notNull()->defaultValue(0)->comment('商品库存'),
            'ishot' => 'enum("0", "1") not null default "0" comment "是否热卖"',
            'isrecommend' => 'enum("0", "1") not null default "0" comment "是否推荐"',
            'ison' =>'enum("0", "1") not null default "0" comment "是否上架"',
            'createtime' => $this->timestamp()->notNull()->comment('创建时间'),
        ]);

        $this->addForeignKey('fk-products-cate_id', 'products', 'cate_id', 'category', 'id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-products-cate_id', 'products');
        $this->dropTable('products');
    }
}

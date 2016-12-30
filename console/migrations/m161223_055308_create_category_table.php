<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m161223_055308_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->comment('分类名称'),
            'parent_id' => $this->integer()->notNull()->defaultValue(0)->comment('父类id'),
            'create_time' => $this->timestamp()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('category');
    }
}

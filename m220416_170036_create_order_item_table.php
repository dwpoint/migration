<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_item}}`.
 */
class m220416_170036_create_order_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_item}}', [
            'id' => $this->primaryKey(11),
            'order_id' => $this->integer(11)->notNull(),
            'product_item_id' => $this->integer(11)->notNull(),
        ]);

        $this->createIndex(
            'order_id',
            'order_item',
            'order_id'
        );

        $this->createIndex(
            'product_item_id',
            'order_item',
            'product_item_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropIndex(
            'order_id',
            'order_item'
        );

        $this->dropIndex(
            'product_item_id',
            'order_item'
        );

        $this->dropTable('{{%order_item}}');
    }
}

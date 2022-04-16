<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m220416_165309_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(11),
            'product_id' => $this->integer(11)->notNull(),
            'quantity' => $this->integer(11)->notNull(),
            'cost' => $this->float()->notNull(),
            'status' => $this->smallInteger(6)->notNull(),
            'hold_status' => $this->smallInteger(6)->notNull(),
            'email' => $this->string(244)->notNull(),
            'email_hash' => $this->string(100)->notNull(),
            'created_at' => $this->integer(11)->notNull(),
        ]);

        $this->createIndex(
            'product_id',
            'order',
            'product_id'
        );

        $this->addForeignKey(
            'order_ibfk_1',
            'order',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );

    }



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'order_ibfk_1',
            'order'
        );

        $this->dropIndex(
            'product_id',
            'order'
        );

        $this->dropTable('{{%order}}');
    }
}

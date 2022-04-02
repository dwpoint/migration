<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_item}}`.
 */
class m220402_122831_create_product_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_item}}', [
            'id' => $this->primaryKey(11),
            'product_id' => $this->integer(11)->notNull(),
            'value' => $this->text()->notNull(),
            'status' => $this->smallInteger(6)->notNull(),
            'uploaded_at' => $this->integer(11)->notNull(),
            'release_at' => $this->integer(11)->notNull(),
        ]);

        $this->createIndex(
            'product_id',
            'product_item',
            'product_id'
        );

        $this->addForeignKey(
            'product_item_ibfk_1',
            'product_item',
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
        $this->dropTable('{{%product_item}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m220402_120853_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(11),
            'user_id' => $this->integer(11)->notNull(),
            'group_id' => $this->integer(11)->notNull(),
            'name' => $this->string(244)->notNull(),
            'description' => $this->text()->notNull(),
            'price' => $this->float()->notNull(),
            'status' => $this->smallInteger(6)->notNull(),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
            'refusal_reason' => $this->text()->defaultValue(null),
        ]);

        $this->createIndex(
            'user_id',
            'product',
            'user_id'
        );

        $this->createIndex(
            'group_id',
            'product',
            'group_id'
        );


        $this->addForeignKey(
            'product_ibfk_1',
            'product',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'product_ibfk_2',
            'product',
            'group_id',
            'group',
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
            'product_ibfk_1',
            'product'
        );

        $this->dropForeignKey(
            'product_ibfk_2',
            'product'
        );

        $this->dropIndex(
            'user_id',
            'product'
        );

        $this->dropIndex(
            'group_id',
            'product'
        );

        $this->dropTable('{{%product}}');
    }
}
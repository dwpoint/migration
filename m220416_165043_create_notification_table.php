<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%notification}}`.
 */
class m220416_165043_create_notification_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%notification}}', [
            'id' => $this->primaryKey(11),
            'user_id' => $this->integer(11)->notNull(),
            'title' => $this->string(128)->notNull(),
            'message' => $this->text()->notNull(),
            'is_read' => $this->tinyInteger(1)->notNull()->defaultValue(0),
            'date' => $this->integer(11)->notNull(),
        ], $tableOptions);

        $this->createIndex(
            'user_id',
            'notification',
            'user_id'
        );

        $this->addForeignKey(
            'notification_ibfk_1',
            'notification',
            'user_id',
            'user',
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
            'notification_ibfk_1',
            'notification'
        );

        $this->dropIndex(
            'user_id',
            'notification'
        );

        $this->dropTable('{{%notification}}');
    }
}

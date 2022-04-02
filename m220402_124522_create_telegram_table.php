<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegram}}`.
 */
class m220402_124522_create_telegram_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%telegram}}', [
            'user_id' => $this->integer(11)->unique()->notNull(),
            'verify_token' => $this->string(128)->notNull(),
            'status' => $this->smallInteger(6)->notNull(),
            'username' => $this->string(128)->defaultValue(null),
            'account_id' => $this->bigInteger(18)->defaultValue(null),
        ]);

        $this->addForeignKey(
            'telegram_ibfk_1',
            'telegram',
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
            'telegram_ibfk_1',
            'telegram'
        );

        $this->dropTable('{{%telegram}}');
    }
}

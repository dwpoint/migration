<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_telegram}}`.
 */
class m220402_140046_create_user_telegram_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_telegram}}', [
            'user_id' => $this->integer(11)->unique()->notNull(),
            'verify_token' => $this->string(128)->defaultValue(null),
            'status' => $this->smallInteger(6)->notNull(),
            'username' => $this->string(128)->notNull(),
            'account_id' => $this->integer(11)->defaultValue(null),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('{{%user_telegram}}');
    }
}
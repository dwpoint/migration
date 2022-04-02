<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%verification_auth}}`.
 */
class m220402_142026_create_verification_auth_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%verification_auth}}', [
            'hash' => $this->string(50)->notNull(),
            'addressee' => $this->string(100)->defaultValue(null),
            'user_id' => $this->integer(11)->notNull(),
            'verify_code' => $this->integer(11)->notNull(),
            'created_at' => $this->integer(11)->notNull(),
            'resend_at' => $this->integer(11)->notNull(),
            'ip' => $this->string(128)->notNull(),
            'is_confirmed' => $this->tinyInteger(1)->notNull()->defaultValue(0),
            'attempts' => $this->integer(11)->notNull()->defaultValue(0),
        ]);

        $this->addPrimaryKey('hash', 'verification_auth', ['hash']);

        $this->createIndex(
            'user_id',
            'verification_auth',
            'user_id'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropPrimaryKey(
            'hash',
            'verification_auth'
        );

        $this->dropIndex(
            'user_id',
            'verification_auth'
        );

        $this->dropTable('{{%verification_auth}}');
    }
}

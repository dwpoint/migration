<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m220402_120506_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(11),
            'username' => $this->string(255)->unique()->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string(255)->notNull(),
            'password_reset_token' => $this->string(255)->unique()->defaultValue(null),
            'email' => $this->string(255)->unique()->notNull(),
            'status' => $this->smallInteger(6)->notNull()->defaultValue(10),
            'balance' => $this->float()->notNull()->defaultValue(0),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
            'verification_contact' => $this->string(128)->defaultValue(null),
            'ip' => $this->string(128)->defaultValue(null),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        /*   $this->dropForeignKey(
               'username',
               'user'
           );

           $this->dropForeignKey(
               'email',
               'user'
           );

           $this->dropForeignKey(
               'password_reset_token',
               'user'
           );*/

        $this->dropTable('{{%user}}');
    }
}
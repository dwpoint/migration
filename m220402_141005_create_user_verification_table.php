<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_verification}}`.
 */
class m220402_141005_create_user_verification_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_verification}}', [
            'user_id' => $this->integer(11)->unique()->notNull(),
            'contact' => $this->string(128)->defaultValue(null),
            'type' => $this->string(50)->defaultValue(null),
            'is_enabled' => $this->tinyInteger(1)->notNull()->defaultValue(0),
        ]);

        $this->addForeignKey(
            'user_verification_ibfk_1',
            'user_verification',
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
            'user_verification_ibfk_1',
            'user_verification'
        );

        $this->dropTable('{{%user_verification}}');
    }
}

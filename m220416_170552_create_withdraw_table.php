<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%withdraw}}`.
 */
class m220416_170552_create_withdraw_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%withdraw}}', [
            'id' => $this->primaryKey(11),
            'user_id' => $this->integer(11)->notNull(),
            'sum' => $this->float()->notNull(),
            'system' => $this->integer(11)->notNull(),
            'bill' => $this->string(246)->notNull(),
            'status' => $this->smallInteger(6)->notNull(),
            'created_at' => $this->integer(11)->notNull(),
            'handled_at' => $this->integer(11)->defaultValue(null),
            'ip' => $this->string(128)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%withdraw}}');
    }
}

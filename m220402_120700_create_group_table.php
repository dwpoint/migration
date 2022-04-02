<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%group}}`.
 */
class m220402_120700_create_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%group}}', [
            'id' => $this->primaryKey(11),
            'name' => $this->string(244)->notNull(),
            'miniature' => $this->string(244)->defaultValue(null),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%group}}');
    }
}

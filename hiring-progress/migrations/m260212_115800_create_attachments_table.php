<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%attachments}}`.
 */
class m260212_115800_create_attachments_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('attachments', [
            'id' => $this->primaryKey(),
            'module' => $this->string(50)->notNull(), // job, candidate, application
            'reference_id' => $this->integer()->notNull(),
            'file_name' => $this->string()->notNull(),
            'file_path' => $this->string()->notNull(),
            'uploaded_at' => $this->integer()->notNull(),
            'uploaded_by' => $this->integer(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('attachments');
    }
}

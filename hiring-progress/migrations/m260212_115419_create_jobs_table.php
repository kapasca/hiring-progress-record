<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%jobs}}`.
 */
class m260212_115419_create_jobs_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('jobs', [
            'id' => $this->primaryKey(),
            'job_code' => $this->string(50)->notNull()->unique(),
            'title' => $this->string()->notNull(),
            'division' => $this->string(100),
            'status' => $this->tinyInteger()->notNull()->defaultValue(1),
            'description' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('jobs');
    }
}

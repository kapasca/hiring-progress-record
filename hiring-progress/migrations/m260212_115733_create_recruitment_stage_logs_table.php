<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%recruitment_stage_logs}}`.
 */
class m260212_115733_create_recruitment_stage_logs_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('recruitment_stage_logs', [
            'id' => $this->primaryKey(),
            'job_application_id' => $this->integer()->notNull(),
            'stage_code' => $this->string(50)->notNull(),
            'action_type' => $this->string(50)->notNull(),
            'status' => $this->string(50),
            'remarks' => $this->text(),
            'metadata' => $this->text(), // JSON optional
            'created_at' => $this->integer()->notNull(),
            'created_by' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-stage-application',
            'recruitment_stage_logs',
            'job_application_id',
            'job_applications',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('recruitment_stage_logs');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%job_applications}}`.
 */
class m260212_115703_create_job_applications_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('job_applications', [
            'id' => $this->primaryKey(),
            'job_id' => $this->integer()->notNull(),
            'candidate_id' => $this->integer()->notNull(),
            'current_stage' => $this->string(50)->notNull()->defaultValue('cv_review'),
            'final_status' => $this->string(30), // hired, rejected, withdrawn
            'applied_at' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'created_by' => $this->integer(),
        ]);

        // FK
        $this->addForeignKey(
            'fk-application-job',
            'job_applications',
            'job_id',
            'jobs',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-application-candidate',
            'job_applications',
            'candidate_id',
            'candidates',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('job_applications');
    }
}

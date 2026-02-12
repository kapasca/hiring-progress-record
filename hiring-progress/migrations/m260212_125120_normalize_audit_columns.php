<?php

use yii\db\Migration;

class m260212_125120_normalize_audit_columns extends Migration
{
    public function safeUp()
    {
        $db = Yii::$app->db;

        $tables = [
            'attachments',
            'candidates',
            'jobs',
            'job_applications',
            'recruitment_stage_logs',
        ];

        foreach ($tables as $table) {

            $schema = $db->getTableSchema($table);

            // ===== CREATED_AT =====
            if (!isset($schema->columns['created_at'])) {
                if (isset($schema->columns['uploaded_at'])) {
                    $this->renameColumn($table, 'uploaded_at', 'created_at');
                } else {
                    $this->addColumn($table, 'created_at', $this->integer()->null());
                }
            }

            // ===== CREATED_BY =====
            if (!isset($schema->columns['created_by'])) {
                if (isset($schema->columns['uploaded_by'])) {
                    $this->renameColumn($table, 'uploaded_by', 'created_by');
                } else {
                    $this->addColumn($table, 'created_by', $this->integer()->null());
                }
            }

            // ===== UPDATED_AT =====
            if (!isset($schema->columns['updated_at'])) {
                $this->addColumn($table, 'updated_at', $this->integer()->null());
            }

            // ===== UPDATED_BY =====
            if (!isset($schema->columns['updated_by'])) {
                $this->addColumn($table, 'updated_by', $this->integer()->null());
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m260212_125120_normalize_audit_columns cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260212_125120_normalize_audit_columns cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%jobs}}`.
 */
class m260212_114503_create_jobs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // $this->createTable('jobs', [
        //     'id' => $this->primaryKey(),
        //     'title' => $this->string()->notNull(),
        //     'division' => $this->string(),
        //     'status' => $this->tinyInteger()->notNull()->defaultValue(1),
        //     'created_at' => $this->integer(),
        //     'created_by' => $this->integer(),
        // ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // $this->dropTable('{{%jobs}}');
    }
}

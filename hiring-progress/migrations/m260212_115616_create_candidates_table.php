<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%candidates}}`.
 */
class m260212_115616_create_candidates_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('candidates', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'phone' => $this->string(50),
            'source' => $this->string(50), // manatal, referral, internal
            'created_at' => $this->integer()->notNull(),
            'created_by' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-candidate-email',
            'candidates',
            'email'
        );
    }

    public function safeDown()
    {
        $this->dropTable('candidates');
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recruitment_stage_logs".
 *
 * @property int $id
 * @property int $job_application_id
 * @property string $stage_code
 * @property string $action_type
 * @property string|null $status
 * @property string|null $remarks
 * @property string|null $metadata
 * @property int $created_at
 * @property int|null $created_by
 *
 * @property JobApplications $jobApplication
 */
class RecruitmentStageLogs extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recruitment_stage_logs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'remarks', 'metadata', 'created_by'], 'default', 'value' => null],
            [['job_application_id', 'stage_code', 'action_type', 'created_at'], 'required'],
            [['job_application_id', 'created_at', 'created_by'], 'integer'],
            [['remarks', 'metadata'], 'string'],
            [['stage_code', 'action_type', 'status'], 'string', 'max' => 50],
            [['job_application_id'], 'exist', 'skipOnError' => true, 'targetClass' => JobApplications::class, 'targetAttribute' => ['job_application_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'job_application_id' => 'Job Application ID',
            'stage_code' => 'Stage Code',
            'action_type' => 'Action Type',
            'status' => 'Status',
            'remarks' => 'Remarks',
            'metadata' => 'Metadata',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[JobApplication]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJobApplication()
    {
        return $this->hasOne(JobApplications::class, ['id' => 'job_application_id']);
    }

}

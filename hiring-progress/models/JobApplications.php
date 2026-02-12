<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "job_applications".
 *
 * @property int $id
 * @property int $job_id
 * @property int $candidate_id
 * @property string $current_stage
 * @property string|null $final_status
 * @property int $applied_at
 * @property int $created_at
 * @property int|null $created_by
 *
 * @property Candidates $candidate
 * @property Jobs $job
 * @property RecruitmentStageLogs[] $recruitmentStageLogs
 */
class JobApplications extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job_applications';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['final_status', 'created_by'], 'default', 'value' => null],
            [['current_stage'], 'default', 'value' => 'cv_review'],
            [['job_id', 'candidate_id', 'applied_at', 'created_at'], 'required'],
            [['job_id', 'candidate_id', 'applied_at', 'created_at', 'created_by'], 'integer'],
            [['current_stage'], 'string', 'max' => 50],
            [['final_status'], 'string', 'max' => 30],
            [['candidate_id'], 'exist', 'skipOnError' => true, 'targetClass' => Candidates::class, 'targetAttribute' => ['candidate_id' => 'id']],
            [['job_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jobs::class, 'targetAttribute' => ['job_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'job_id' => 'Job ID',
            'candidate_id' => 'Candidate ID',
            'current_stage' => 'Current Stage',
            'final_status' => 'Final Status',
            'applied_at' => 'Applied At',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[Candidate]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCandidate()
    {
        return $this->hasOne(Candidates::class, ['id' => 'candidate_id']);
    }

    /**
     * Gets query for [[Job]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(Jobs::class, ['id' => 'job_id']);
    }

    /**
     * Gets query for [[RecruitmentStageLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecruitmentStageLogs()
    {
        return $this->hasMany(RecruitmentStageLogs::class, ['job_application_id' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "attachments".
 *
 * @property int $id
 * @property string $module
 * @property int $reference_id
 * @property string $file_name
 * @property string $file_path
 * @property int $uploaded_at
 * @property int|null $uploaded_by
 */
class Attachments extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attachments';
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
            [['uploaded_by'], 'default', 'value' => null],
            [['module', 'reference_id', 'file_name', 'file_path', 'uploaded_at'], 'required'],
            [['reference_id', 'uploaded_at', 'uploaded_by'], 'integer'],
            [['module'], 'string', 'max' => 50],
            [['file_name', 'file_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'module' => 'Module',
            'reference_id' => 'Reference ID',
            'file_name' => 'File Name',
            'file_path' => 'File Path',
            'uploaded_at' => 'Uploaded At',
            'uploaded_by' => 'Uploaded By',
        ];
    }
}

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RecruitmentStageLogs $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="recruitment-stage-logs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'job_application_id')->textInput() ?>

    <?= $form->field($model, 'stage_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'action_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'metadata')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RecruitmentStageLogs $model */

$this->title = 'Update Recruitment Stage Logs: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recruitment Stage Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recruitment-stage-logs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

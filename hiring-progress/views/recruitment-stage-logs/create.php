<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RecruitmentStageLogs $model */

$this->title = 'Create Recruitment Stage Logs';
$this->params['breadcrumbs'][] = ['label' => 'Recruitment Stage Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recruitment-stage-logs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\JobApplications $model */

$this->title = 'Create Job Applications';
$this->params['breadcrumbs'][] = ['label' => 'Job Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-applications-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

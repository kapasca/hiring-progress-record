<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Attachments $model */

$this->title = 'Create Attachments';
$this->params['breadcrumbs'][] = ['label' => 'Attachments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attachments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

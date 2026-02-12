<?php

namespace app\controllers;

class CandidatesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}

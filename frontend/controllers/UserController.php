<?php

namespace frontend\controllers;

use common\models\User;
use yii\data\ActiveDataProvider;
use yii\rest\Controller;

/**
 * Class UserController
 */
class UserController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);

        return $dataProvider;
    }
}
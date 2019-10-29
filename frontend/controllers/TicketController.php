<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use yii\rest\ActiveController;
use common\models\Ticket;

class TicketController extends ActiveController
{

    /**
     * @SWG\Get(path="/",
     *     tags={"Ticket"},
     *     summary="Retrieves Ticket List.",
     *     @SWG\Response(
     *         response = 200,
     *         description = "retrieves tickets' list",
     *         @SWG\Schema(ref = "#/definitions/Ticket")
     *     ),
     * ),
     * @SWG\Post(path="/create",
     *     tags={"Ticket"},
     *     summary="Creates Ticket item.",
     *     @SWG\Response(
     *         response = 200,
     *         description = "creates ticket item",
     *         @SWG\Schema(ref = "#/definitions/Ticket")
     *     ),
     * ),
     * @SWG\Put(path="/update?id={id}",
     *     tags={"Ticket"},
     *     summary="Updates Ticket item.",
     *     @SWG\Response(
     *         response = 200,
     *         description = "updates ticket item",
     *         @SWG\Schema(ref = "#/definitions/Ticket")
     *     ),
     * ),
     * @SWG\Delete(path="/delete?id={id}",
     *     tags={"Ticket"},
     *     summary="Deletes Ticket item.",
     *     @SWG\Response(
     *         response = 200,
     *         description = "deletes ticket item",
     *         @SWG\Schema(ref = "#/definitions/Ticket")
     *     ),
     * )
     */
    public $modelClass = Ticket::class;

    /**
     * @inheritdoc
     */
    public function actions(): array
    {
        return array_merge(parent::actions(), [
            'docs' => [
                'class' => 'yii2mod\swagger\SwaggerUIRenderer',
                'restUrl' => Url::to(['ticket/json-schema']),
            ],
            'json-schema' => [
                'class' => 'yii2mod\swagger\OpenAPIRenderer',
                'scanDir' => [
                    Yii::getAlias('@frontend/controllers'),
                    Yii::getAlias('@common/models'),
                ],
            ],
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ]);
    }
}

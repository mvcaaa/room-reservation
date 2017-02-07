<?php
/**
 * Created by MvC on 07.02.2017.
 */

namespace app\controllers;

use app\models\Reservation;
use Yii;
use yii\rest\ActiveController;


class RoomController extends ActiveController
{
    public $modelClass = 'app\models\Room';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array_merge(
          parent::behaviors(),
          [

              // For cross-domain AJAX request
            'corsFilter' => [
              'class' => \yii\filters\Cors::className(),
              'cors'  => [
                  // restrict access to domains:
                'Origin'                         => ['*'],
                'Access-Control-Request-Method'  => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['Origin', 'X-Requested-With', 'Content-Type', 'accept', 'Authorization'],
              ],
            ],

          ]
        );
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['update']);

        return $actions;
    }

    /**
     * @inheritdoc
     */
    public function actionUpdate($id)
    {
        $reservation = Yii::$app->request->post('reservations');
        
        if ($reservation) {
            // existing reservation
            if (array_key_exists('id', $reservation)) {
                $res_obj = (new Reservation())::findOne($reservation['id']);
                $res_obj->attributes = $reservation;
                $res_obj->save();
            } else {
                $res_obj = new Reservation();
                $res_obj->attributes = $reservation;
                $res_obj->room_id = $id;
                $res_obj->save();
            }
            if (empty($reservation['client_name'])) {
                $res_obj = (new Reservation())::findOne($reservation['id']);
                $res_obj->delete();
            }
        }
        
        $model = (new $this->modelClass)::findOne($id);
        $model->attributes = Yii::$app->request->post();
        $model->save();
    }


}
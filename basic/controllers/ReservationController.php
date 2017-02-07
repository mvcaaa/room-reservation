<?php
/**
 * Created by Astashov Andrey <mvc.aaa@gmail.com>
 * Date: 06.02.2017 / 22:11
 */

namespace app\controllers;

use yii\rest\ActiveController;


class ReservationController extends ActiveController
{
    public $modelClass = 'app\models\Reservation';
}
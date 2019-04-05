<?php
/**
 * Created by PhpStorm.
 * User: margaritapopova
 * Date: 2019-03-26
 * Time: 11:10
 */

namespace app\controllers;


use app\base\BaseController;
use app\controllers\actions\DayCreateAction;

class DayController extends BaseController
{
    public function actions()
    {
        return [
            'create'=>['class'=>DayCreateAction::class]
        ];
    }
}
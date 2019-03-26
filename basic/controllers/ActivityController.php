<?php
/**
 * Created by PhpStorm.
 * User: margaritapopova
 * Date: 2019-03-22
 * Time: 16:47
 */

namespace app\controllers;


use app\base\BaseController;
use app\controllers\actions\ActivityCreateAction;

class ActivityController extends BaseController
{
    public function actions()
    {
        return [
           'create'=>['class'=>ActivityCreateAction::class]
           // 'new'=>['class'=>ActivityCreateAction::class]
        ];
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: margaritapopova
 * Date: 2019-03-19
 * Time: 15:07
 */

namespace app\controllers;


use yii\web\Controller;

class TeacherController extends Controller
{
    public function actionStudent() {

        $name_student = 'Mag';
        return $this->render('student', ['name'=>$name_student]);
    }
}

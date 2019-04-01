<?php
/**
 * Created by PhpStorm.
 * User: margaritapopova
 * Date: 2019-03-26
 * Time: 11:10
 */

namespace app\controllers\actions;

use app\components\DayComponent;
use app\models\Day;
use yii\base\Action;

class DayCreateAction extends Action
{
    public function run() {

        //$component = \Yii::$app->activity;
        //Или так:

        $component = \Yii::createObject([
            'class' => DayComponent::class,
            'model_class' => Day::class
        ]);


        $model = \Yii::$app->day->getModel();


        if(\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());

            /**
             * Возможные действия с моделью:
             */

            //$model->getAttributes(['title']);
            //print_r($model->getAttributes());

            //$model->setAttributes(['title' => 'My title']);

            if($component->createDay($model)) {

            }
        }

        return $this->controller->render('create', ['model' => $model]);
    }
}
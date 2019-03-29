<?php
/**
 * Created by PhpStorm.
 * User: margaritapopova
 * Date: 2019-03-22
 * Time: 18:35
 * @var \app\components\ActivityComponent $component
 */

namespace app\controllers\actions;

use app\components\ActivityComponent;
use app\models\Activity;
use yii\base\Action;
use yii\web\Response;
use yii\widgets\ActiveForm;

class ActivityCreateAction extends Action
{
    public $name;

    public function run() {

        //$component = \Yii::$app->activity;
        //Или так:

        $component = \Yii::createObject([
            'class' => ActivityComponent::class,
            'model_class' => Activity::class
        ]);


        $model = \Yii::$app->activity->getModel();


        if(\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            if(\Yii::$app->request->isAjax) {
                \Yii::$app->response->format = Response::FORMAT_JSON;
                $model->load(\Yii::$app->request->post());
                return ActiveForm::validate($model);
            }

            /**
             * Возможные действия с моделью:
             */

            //$model->getAttributes(['title']);
            //print_r($model->getAttributes());

            //$model->setAttributes(['title' => 'My title']);

            if($component->createActivity($model)) {
                return $this->controller->render('view', ['model' => $model]);
            }
        }

        return $this->controller->render('create', ['model' => $model, 'name'=>$this->name]);
    }
}
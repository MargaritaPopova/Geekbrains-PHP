<?php
/**
 * Created by PhpStorm.
 * User: margaritapopova
 * Date: 2019-03-26
 * Time: 10:15
 */

namespace app\components;


use app\models\Activity;
use yii\base\Component;

class ActivityComponent extends Component
{
    public $model_class;

    public function init()
    {
        parent::init();
        if(empty($this->model_class)) {
            throw new \Exception('Need model_class param');
        }
    }

    public function getModel() {
        return new $this->model_class();
    }

    public function createActivity(&$model):bool {
        $model->load(\Yii::$app->request->post());
        if(!$model->validate()) {
            $model->getErrors();
            return false;
        }

        return true;

    }
}
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
use yii\web\UploadedFile;

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
        $model->file = UploadedFile::getInstance($model, 'file');
        $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');

        if(!$model->validate()) {
            $model->getErrors();
            return false;
        }
        $comp = \Yii::createObject(['class' => FileServiceComponent::class]);

        foreach ($model->imageFiles as $file) {
            if (!empty($file = $comp->saveUploadedFile($file))) {
                $model->file = basename($file);
            }
        }
        return true;

    }
}
<?php
/**
 * Created by PhpStorm.
 * User: margaritapopova
 * Date: 2019-03-28
 * Time: 15:36
 */

namespace app\components;


use yii\base\Component;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class FileServiceComponent extends Component
{
    public function saveUploadedFile(UploadedFile $file):string {
        $path = $this->genPathForFile($file);

        return $file->saveAs($path) ? $path : '';
    }



    private function genPathForFile(UploadedFile $file):string {
        return \Yii::getAlias('@webroot/images/').uniqid().'.'.$file->extension;
    }
}
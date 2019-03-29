<?php
/**
 * Created by PhpStorm.
 * User: margaritapopova
 * Date: 2019-03-28
 * Time: 14:48
 */

namespace app\models\rules;
use \yii\validators\Validator;


class NotAdminRule extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        if($model->$attribute == 'admin') {
            $model->addError($attribute, 'Заголовок не может быть admin');
        }
    }
}
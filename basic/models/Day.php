<?php
/**
 * Created by PhpStorm.
 * User: margaritapopova
 * Date: 2019-03-22
 * Time: 18:53
 */

namespace app\models;


use yii\base\Model;

class Day extends Model
{
    public $title;
    public $description;
    public $is_working;
    public $is_blocked;
    public function rules()
    {
        return [
            ['title', 'required'],
            ['description', 'string', 'min' => 10],
            ['is_blocked', 'boolean'],
            ['is_working', 'boolean']
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'description' => 'Описание',
            'is_working' => 'Рабочий день',
            'is_blocked' => 'Блокирующее событие'

        ];
    }
}
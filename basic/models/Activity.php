<?php
/**
 * Created by PhpStorm.
 * User: margaritapopova
 * Date: 2019-03-22
 * Time: 18:53
 */

namespace app\models;


use yii\base\Model;

class Activity extends Model
{
    public $title;
    public $description;
    public $start_date;
    public $repeated;
    public $is_blocked;
    public function rules()
    {
        return [
            ['title', 'required'],
            ['description', 'string', 'min' => 10],
            ['is_blocked', 'boolean']
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'description' => 'Описание',
            'start_date' => 'Дата начала',
            'repeated' => 'Повторять событие',
            'is_blocked' => 'Блокирующее событие'

        ];
    }
}
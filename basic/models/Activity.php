<?php
/**
 * Created by PhpStorm.
 * User: margaritapopova
 * Date: 2019-03-22
 * Time: 18:53
 */

namespace app\models;


use app\models\rules\NotAdminRule;
use function foo\func;
use function Sodium\compare;
use yii\base\Model;

class Activity extends Model
{
    public $title;
    public $description;
    public $start_date;
//    public $repeat_type;
    public $repeated;
    public $is_blocked;
    public $email;
    public $use_notification;
    public $repeat_email;
    public $file;
    public $imageFiles;


    protected static $repeat_types = [
        0 => 'Без повтора',
        1 => 'Ежедневно',
        2 => 'Еженедельно',
        3 => 'Ежемесячно',
        4 => 'Ежегодно',
    ];

    public function beforeValidate()
    {
        if($this->start_date) {
            $date = \DateTime::createFromFormat('d.m.Y', $this->start_date);

            if($date) {
                $this->start_date = $date->format('Y-m-d');
            }
        }

        return parent::beforeValidate();
    }

    public function rules()
    {
        return [
            [['title', 'start_date'], 'required'],
            [['title', 'description'], 'trim'],
            ['description', 'string', 'min' => 10, 'max' => 500],
            [['is_blocked', 'use_notification'], 'boolean'],
            ['start_date', 'date', 'format' => 'php:Y-m-d'],
            ['repeated', 'in', 'range' => array_keys(self::$repeat_types)],
            ['email', 'email'],
            ['repeat_email', 'compare', 'compareAttribute' => 'email', 'message' => 'Значения email должны совпадать'],
            ['email', 'required', 'when' => function($model){
                return $model->use_notification == 1? true : false;
            }],
            //['title', 'notAdmin']
            [['imageFiles'],'file','extensions' => ['jpg','png'], 'maxFiles' => 10],
            ['title', NotAdminRule::class]
        ];
    }
//
//    public function notAdmin($attr) {
//        if($this->title == 'admin') {
//            $this->addError('title', 'Заголовок не может быть admin');
//        }
//    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'description' => 'Описание',
            'start_date' => 'Дата начала',
            'repeated' => 'Повторять событие',
            'is_blocked' => 'Блокирующее событие',
            'use_notification' => 'Отправить уведомление о событии'

        ];
    }

    public function getRepeatTypes() {
        return static::$repeat_types;
    }

    public function getRepeatType($id) {
        $data = $this->getRepeatTypes();
        return array_key_exists($id, $data) ? $data[$id] : false;
    }


}
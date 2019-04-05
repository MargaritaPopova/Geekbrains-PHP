<?php
/**
 * Created by PhpStorm.
 * User: margaritapopova
 * Date: 2019-03-22
 * Time: 18:53
 */

namespace app\models;


use app\models\rules\NotAdminRule;
use yii\base\Model;
use app\base\BaseModel;
use yii\db\Query;
use yii\helpers\ArrayHelper;

class Activity extends ActivityBase
{

    public $images;


    protected static $repeat_types = [
        0 => 'Без повтора',
        1 => 'Ежедневно',
        2 => 'Еженедельно',
        3 => 'Ежемесячно',
        4 => 'Ежегодно',
    ];

    public function beforeValidate()
    {
        if($this->date_start) {
            $date = \DateTime::createFromFormat('d.m.Y', $this->start_date);

            if($date) {
                $this->date_start = $date->format('Y-m-d');
            }
        }

        return parent::beforeValidate();
    }

    public function rules()
    {
        return array_merge([
            [['title', 'description', 'email'], 'trim'],
            [['title', 'date_start'], 'required'],
            ['description', 'string', 'max' => 255],
            [['is_blocked', 'use_notification'], 'boolean'],
            [['date_start', 'date_end'], 'date', 'format' => 'php:d.m.Y'],
            [['date_start', 'date_end'], 'validateDates'],
            ['email', 'required', 'when' => function($model) {
                return $model->use_notification == 1 ? true : false;
            }],
            ['images', 'file', 'mimeTypes' => 'images/*', 'maxFiles' => 10]
        ],parent::rules());
    }

    /**
     * @param $attribute
     * @throws \Exception
     */
    public function validateDates($attribute)
    {
        $date_start = \DateTime::createFromFormat('d.m.Y', $this->date_start);
        $date_start = $date_start ? intval($date_start->format('Ymd')) : 0;
        $date_end = \DateTime::createFromFormat('d.m.Y', $this->date_end);
        $date_end = $date_end ? intval($date_end->format('Ymd')) : 0;
        $current_date = intval((new \DateTime())->format('Ymd'));
        if ($attribute == 'date_start') {
            if ($date_start && $date_start <= $current_date) {
                $this->addError('date_start', 'Дата начала уже прошла');
            }
        }
        if ($attribute == 'date_end') {
            if ($date_start && $date_end && $date_end < $date_start) {
                $this->addError('date_end', 'Дата окончания не может быть меньше даты начала');

            }
        }
    }

    public function getDataForStorage() {
        $data = $this->attributes;
        $data['user_id'] = 1;
        unset($data['images']);
        $data['date_start'] = \DateTime::createFromFormat('d.m.Y', $data['date_start'])
            ->format('Y-m-d');
        if ($data['date_end']) {
            $data['date_end'] = \DateTime::createFromFormat('d.m.Y', $data['date_end'])
                ->format('Y-m-d');
        }
        return $data;
    }
    public function loadFromStorageData($data) {
        $data['images'] = array();
        $data['date_start'] = \DateTime::createFromFormat('Y-m-d H:i:s', $data['date_start'])
            ->format('d.m.Y');
        if ($data['date_end']) {
            $data['date_end'] = \DateTime::createFromFormat('Y-m-d H:i:s', $data['date_end'])
                ->format('d.m.Y');
        }
        $this->attributes = $data;
    }

}
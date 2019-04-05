<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $description
 * @property string $date_start
 * @property string $date_end
 * @property int $is_blocked
 * @property int $use_notification
 * @property string $email
 * @property string $date_created
 *
 * @property ActivityRepeatType $repeatType
 * @property User $user
 */
class ActivityBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'title', 'date_start'], 'required'],
            [['user_id', 'is_blocked', 'use_notification'], 'integer'],
            [['description'], 'string'],
            [['date_start', 'date_end', 'date_add'], 'safe'],
            [['title', 'email'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'date_start' => Yii::t('app', 'Date Start'),
            'date_end' => Yii::t('app', 'Date End'),
            'is_blocked' => Yii::t('app', 'Is Blocked'),
            'use_notification' => Yii::t('app', 'Use Notification'),
            'email' => Yii::t('app', 'Email'),
            'date_created' => Yii::t('app', 'Date Add'),
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
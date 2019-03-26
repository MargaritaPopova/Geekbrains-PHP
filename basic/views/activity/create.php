<?php
/**
 * Created by PhpStorm.
 * User: margaritapopova
 * Date: 2019-03-22
 * Time: 18:27
 * @var $model \app\models\Activity
 */
?>

<div class="row">
    <div class="col-md-6">
        <?php $form=\yii\bootstrap\ActiveForm::begin([
            'id' => 'activity-create',
            'method' => 'POST'
        ]);?>
        <?=Yii::getAlias('@app');?>
        <?=Yii::getAlias('@webroot');?>
        <?=$form->field($model, 'title');?>
        <?=$form->field($model, 'description')->textarea(['data-id' => '1']);?>
        <?=$form->field($model, 'repeated')->dropDownList([
                'Понедельник','Вторник','Среда','Четверг','Пятница','Суббота','Воскресенье'
            ])?>
        <?=$form->field($model, 'start_date')->input('date');?>
        <?=$form->field($model, 'is_blocked')->checkbox();?>

        <div class="form-group">
            <button type="submit">Отправить</button>
        </div>
        <?php \yii\bootstrap\ActiveForm::end();?>
    </div>
</div>

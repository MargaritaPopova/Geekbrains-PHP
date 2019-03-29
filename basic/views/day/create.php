<?php
/**
 * Created by PhpStorm.
 * User: margaritapopova
 * Date: 2019-03-22
 * Time: 18:27
 * @var $model \app\models\Day
 */
?>

<div class="row">
    <div class="col-md-6">
        <?php $form=\yii\bootstrap\ActiveForm::begin([
            'id' => 'day-create',
            'method' => 'POST'
        ]);?>
        <?=Yii::getAlias('@app');?>
        <?=Yii::getAlias('@webroot');?>

        <h3>Это заглушка сущности День </h3>
        <?=$form->field($model, 'title');?>
        <?=$form->field($model, 'description')->textarea(['data-id' => '1']);?>
        <?=$form->field($model, 'is_working')->checkbox();?>
        <?=$form->field($model, 'is_blocked')->checkbox();?>

        <div class="form-group">
            <button type="submit">Отправить</button>
        </div>
        <?php \yii\bootstrap\ActiveForm::end();?>
    </div>
</div>

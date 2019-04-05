<?php
/**
 * Created by PhpStorm.
 * User: margaritapopova
 * Date: 2019-03-22
 * Time: 18:27
 * @var $model \app\models\Activity
 */

use yii\helpers\Html;
//use yii\bootstrap\Html;
?>

<div class="row">
    <div class="col-md-6">
        <?php $form=\yii\bootstrap\ActiveForm::begin([
            'id' => 'activity-create',
            'method' => 'POST',
            'options' => ['enctype' => 'multipart/form-data']
        ]);?>
        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'description')->textarea() ?>
        <?= $form->field($model, 'date_start', [
            'enableAjaxValidation' => true
        ])?>
        <?= $form->field($model, 'date_end', [
            'enableAjaxValidation' => true
        ]) ?>
        <?= $form->field($model, 'images[]')->fileInput(['multiple' => true, 'accept' =>'image/*']) ?>
        <?= $form->field($model, 'is_blocked')->checkbox() ?>
        <?= $form->field($model, 'use_notification')->checkbox() ?>
        <?= $form->field($model, 'email', [
            'enableAjaxValidation' => true,
            'enableClientValidation' => false
        ]) ?>
        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php \yii\bootstrap\ActiveForm::end();?>
    </div>
</div>

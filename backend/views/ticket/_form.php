<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Ticket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'row')->textInput() ?>

    <?= $form->field($model, 'seat')->textInput() ?>

    <?= $form->field($model, 'reserve_type')->textInput() ?>

    <?= $form->field($model, 'reserve_fee')->textInput() ?>

    <?= $form->field($model, 'paid_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

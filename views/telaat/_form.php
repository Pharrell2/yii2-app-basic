<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\telaat $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="telaat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Naam_student')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Klas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Minuten_te_laat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Reden_te_laat')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

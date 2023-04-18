<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\telaatsearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="telaat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Naam_student') ?>

    <?= $form->field($model, 'Klas') ?>

    <?= $form->field($model, 'Minuten_te_laat') ?>

    <?= $form->field($model, 'Reden_te_laat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

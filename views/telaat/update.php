<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\telaat $model */

$this->title = 'Update Telaat: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Telaats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="telaat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

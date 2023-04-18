<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\telaat $model */

$this->title = 'Create Telaat';
$this->params['breadcrumbs'][] = ['label' => 'Telaats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telaat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use app\models\telaat;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\telaatsearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Studenten die telaat waren';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telaat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Telaat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'Naam_student',
            'Klas',
            'Minuten_te_laat',
            'Reden_te_laat',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, telaat $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


<?php

$this->title = 'statstieken';
?>
<div class="studenten-index">


<table class="table table-striped">
<thead>
<tr>
    <th><?= Html::encode($this->title) ?></th>
</tr>
</thead>

<tbody>

<tr>
    <td>Hoogste Minuten_te_laat</td>
    <td><?php echo $hoogste ?></td>
</tr>

</br>

<tr>
    <td>Gemiddeld Minuten_te_laat</td>
    <td><?php echo $gemiddelde ?></td>
</tr>

</br>

<tr>
    <td>Totaal Minuten_te_laat</td>
    <td><?php echo $totaal ?></td>
</tr>
</tbody>
</table>

</br>

<?= Html::a('Weer eentje te laat!', ['create'], ['class' => 'btn btn-success']) ?>

</div> 
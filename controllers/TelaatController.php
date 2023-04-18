<?php

namespace app\controllers;

use Yii;
use app\models\telaat;
use app\models\telaatsearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TelaatController implements the CRUD actions for telaat model.
 */
class TelaatController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all telaat models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new telaatsearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        //hier onder laat ik eerst een sql statement zien die de gemmidelde totale en max minuten berekent die informatie pakt hij van mij database
        $sql="SELECT AVG(Minuten_te_laat) as  gemiddelde, SUM(Minuten_te_laat) as totaal, MAX(Minuten_te_laat) as hoogste FROM te_laat";
        $result = Yii::$app->db->createCommand($sql)->queryOne();

        $hoogste=$result['hoogste'];  //bij deze regel code  krijgt $hoogste de waarde $result['hoogste'] en als je dus  echo $hoogste gebruikt in views/telaat/index.php dan zie je het hoogste aantal minuten te laat van Minuten_te_laat.
        $gemiddelde=$result['gemiddelde']; // bij deze regel gebeurt eigenlijk precies hetzelfde met de regel code hierboven maar dit keer word $gemiddele de waarde van $result['gemiddelde'] en weer echo $gemiddelde gebruikt krijg je het te zien op de views/telaat/index.php
        $totaal=$result['totaal']; // zelfde gebeurt hier maar dit keer wordt $totaal de waarde result['totaal'] en dat krijg je dan ook te zien op views/telaat/index.php

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'hoogste' => $hoogste,  //op deze regel heb ik $hoogste een variabel gegeven om er waarde op de index pagina te geven
            'gemiddelde' => $gemiddelde, //op deze regel heb ik $gemiddelde een variabel gegeven om er waarde op de index pagina te geven
             'totaal' => $totaal,   //op deze regel heb ik $totaal een variabel gegeven om er waarde op de index pagina te geven
        ]);
    }

    /**
     * Displays a single telaat model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new telaat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new telaat();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing telaat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing telaat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the telaat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return telaat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = telaat::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

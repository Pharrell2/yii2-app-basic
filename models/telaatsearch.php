<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\telaat;

/**
 * telaatsearch represents the model behind the search form of `app\models\telaat`.
 */
class telaatsearch extends telaat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['Naam_student', 'Klas', 'Minuten_te_laat', 'Reden_te_laat'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = telaat::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'Naam_student', $this->Naam_student])
            ->andFilterWhere(['like', 'Klas', $this->Klas])
            ->andFilterWhere(['like', 'Minuten_te_laat', $this->Minuten_te_laat])
            ->andFilterWhere(['like', 'Reden_te_laat', $this->Reden_te_laat]);

        return $dataProvider;
    }
}

<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;

/**
 * OrderSearch represents the model behind the search form about `app\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'delivery_status_id', 'user_id', 'user_user_type_id'], 'integer'],
            [['total_amt'], 'number'],
            [['timestamp', 'tracking_number'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Order::find();

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
            'total_amt' => $this->total_amt,
            'timestamp' => $this->timestamp,
            'delivery_status_id' => $this->delivery_status_id,
            'user_id' => $this->user_id,
            'user_user_type_id' => $this->user_user_type_id,
        ]);

        $query->andFilterWhere(['like', 'tracking_number', $this->tracking_number]);

        return $dataProvider;
    }
}
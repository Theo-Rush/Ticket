<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Ticket;

/**
* TicketQuery represents the model behind the search form of `common\models\Ticket`.
*/
class TicketQuery extends Ticket
{
   /**
    * {@inheritdoc}
    */
   public function rules()
   {
       return [
           [['id', 'row', 'seat', 'reserve_type'], 'integer'],
           [['reserve_fee'], 'number'],
           [['paid_at'], 'safe'],
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
       $query = Ticket::find();

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
           'row' => $this->row,
           'seat' => $this->seat,
           'reserve_type' => $this->reserve_type,
           'reserve_fee' => $this->reserve_fee,
           'paid_at' => $this->paid_at,
       ]);

       return $dataProvider;
   }
}
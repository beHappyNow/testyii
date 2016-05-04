<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use app\models\Cities;

/**
 * CitiesSearch represents the model behind the search form about `app\models\Cities`.
 */
class CitiesSearch extends Cities
{


    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['country.country_name']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country_id'], 'integer'],
            [['city_name','country.country_name'], 'safe'],
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
        $query = Cities::find();
        $pages = new Pagination(['totalCount' => $query->count(),]);
        $pages->setPageSize(5);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => $pages
        ]);

        $query->joinWith(['country' => function($query) { $query->from(['country' => 'countries']); }]); //country - name of relation, countries - name of source table of this relation
        // enable sorting for the related column
        $dataProvider->sort->attributes['country.country_name'] = [
            'asc' => ['country.country_name' => SORT_ASC],
            'desc' => ['country.country_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'country_id' => $this->country_id,
        ]);

        $query->andFilterWhere(['like', 'city_name', $this->city_name]);
        $query->andFilterWhere(['LIKE', 'country.country_name', $this->getAttribute('country.country_name')]);


        return $dataProvider;
    }
}

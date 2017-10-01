<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Photos;

/**
 * PhotosSearch represents the model behind the search form about `app\models\Photos`.
 */
class PhotosSearch extends Photos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'cid'], 'integer'],
            [['pname', 'plink'], 'safe'],
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
        $query = Photos::find();

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
            'pid' => $this->pid,
            'cid' => $this->cid,
        ]);

        $query->andFilterWhere(['like', 'pname', $this->pname])
            ->andFilterWhere(['like', 'plink', $this->plink]);

        return $dataProvider;
    }
}

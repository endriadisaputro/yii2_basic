<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pegawai;

/**
 * PegawaiSearch represents the model behind the search form of `app\models\Pegawai`.
 */
class PegawaiSearch extends Pegawai
{
    public $nama_pegawai; //code tambahan u join table menampilkan search nama
    public $alamat_pegawai; //code tambahan u join table menampilkan search alamat
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_personal'], 'integer'],
            [['jenis_pegawai', 'status_pegawai', 'jabatan', 'tgl_bergabung', 'nama_pegawai', 'alamat_pegawai'], 'safe'],
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
        $query = Pegawai::find();

        $query->leftJoin('personal', 'pegawai.id_personal = personal.id_personal'); //join table untuk mengaktifkan fitur search data

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
            'id_personal' => $this->id_personal,
            'tgl_bergabung' => $this->tgl_bergabung,
        ]);

        $query->andFilterWhere(['like', 'jenis_pegawai', $this->jenis_pegawai])
            ->andFilterWhere(['like', 'status_pegawai', $this->status_pegawai])
            ->andFilterWhere(['like', 'jabatan', $this->jabatan])
            ->andFilterWhere(['like', 'personal.nama', $this->nama_pegawai]) //code tambahan
            ->andFilterWhere(['like', 'personal.alamat', $this->alamat_pegawai]); //code tambahan

        return $dataProvider;
    }
}

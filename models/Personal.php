<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personal".
 *
 * @property int $id_personal
 * @property string $nama
 * @property string $jenis_kelamin
 * @property string $tgl_lahir
 * @property string $alamat
 * @property string $email
 *
 * @property Pegawai[] $pegawais
 */
class Personal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'jenis_kelamin', 'tgl_lahir', 'alamat', 'email'], 'required'],
            [['tgl_lahir'], 'safe'],
            [['alamat'], 'string'],
            [['nama', 'jenis_kelamin', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_personal' => 'Id Personal',
            'nama' => 'Nama',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tgl_lahir' => 'Tgl Lahir',
            'alamat' => 'Alamat',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[Pegawais]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPegawais()
    {
        return $this->hasMany(Pegawai::className(), ['id_personal' => 'id_personal']);
    }
    public function getPegawai()
    {
        return $this->hasOne(Pegawai::className(), ['id_personal' => 'id_personal']);
    }
}

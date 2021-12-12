<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property int $id
 * @property int $id_personal
 * @property string $jenis_pegawai
 * @property string $status_pegawai
 * @property string $jabatan
 * @property string $tgl_bergabung
 *
 * @property Personal $personal
 */
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_personal', 'jenis_pegawai', 'status_pegawai', 'jabatan', 'tgl_bergabung'], 'required'],
            [['id_personal'], 'integer'],
            [['tgl_bergabung'], 'safe'],
            [['jenis_pegawai', 'status_pegawai', 'jabatan'], 'string', 'max' => 255],
            [['id_personal'], 'exist', 'skipOnError' => true, 'targetClass' => Personal::className(), 'targetAttribute' => ['id_personal' => 'id_personal']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_personal' => 'Id Personal',
            'jenis_pegawai' => 'Jenis Pegawai',
            'status_pegawai' => 'Status Pegawai',
            'jabatan' => 'Jabatan',
            'tgl_bergabung' => 'Tgl Bergabung',
        ];
    }

    /**
     * Gets query for [[Personal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonal()
    {
        return $this->hasOne(Personal::className(), ['id_personal' => 'id_personal']);
    }
}

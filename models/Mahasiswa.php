<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mahasiswa".
 *
 * @property int $id
 * @property string $nama
 * @property int $nim
 * @property string $jurusan
 */
class Mahasiswa extends \yii\db\ActiveRecord
{
    const JURUSAN = ['Manajemen Informatika' => 'Manajemen Informatika', 'Teknik Informatika' => 'Teknik Informatika', 'Teknik Komputer' => 'Teknik Komputer', 'Sistem Informasi' => 'Sistem Informasi'];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mahasiswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'nim', 'jurusan'], 'required'],
            [['nim'], 'integer'],
            [['nama', 'jurusan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'nim' => 'Nim',
            'jurusan' => 'Jurusan',
        ];
    }
}

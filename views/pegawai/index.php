<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pegawais';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'personal.nama',
            [
                'attribute' => 'nama_pegawai',
                'value' => function ($model) {
                    return $model->personal->nama;
                }
            ],
            [
                'attribute' => 'alamat_pegawai',
                'headerOptions' => [
                    'style' => 'width:300px'
                ],
                'value' => function ($model) {
                    return $model->personal->alamat;
                }
            ],
            'jenis_pegawai',
            'status_pegawai',
            'jabatan',
            //'tgl_bergabung',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
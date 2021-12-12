<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2

/* @var $this yii\web\View */
/* @var $model app\models\Mahasiswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mahasiswa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nim')->textInput() ?>

    <?php //$form->field($model, 'jurusan')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'jurusan')->widget(Select2::classname(), [
    'data' => $jurusan, //terhubung dengan controller dan Model
    'options' => ['placeholder' => 'Pilih Jurusan ...'],
    // 'hideSearch'=>true,
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

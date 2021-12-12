<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Personal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Form Personal</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="dropdown-item" href="#">Settings 1</a></li>
                            <li><a class="dropdown-item" href="#">Settings 2</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php $form = ActiveForm::begin(); ?>
                <div class="col-md-6">
                    <div class="item form-group">
                        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item form-group">
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item form-group">
                        <?= $form->field($model, 'jenis_kelamin')->radioList(['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'], [
                            'item' => function ($index, $label, $name, $checked, $value) {
                                return '<label><input type="radio" class="flat" name="' . $name . '" value="' . $value . '" ' . ($checked ? "checked" : "") . '>' . $label . '</label>';
                            }
                        ]) ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item form-group">
                        <?php // $form->field($model, 'tgl_lahir')->textInput() 
                        ?>
                        <?= $form->field($model, 'tgl_lahir')->widget(DatePicker::classname(), [
                            'options' => ['placeholder' => 'Enter birth date ...'],
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'dd-MM-yyyy'
                            ]
                        ]); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="item form-group">
                        <?= $form->field($model, 'alamat')->textarea(['rows' => 3]) ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                        <?= Html::resetButton('Reset', ['class' => 'btn btn-info']) ?>
                        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
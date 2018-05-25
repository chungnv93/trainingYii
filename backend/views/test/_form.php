<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Categories;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model common\models\Tests */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tests-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?php if(isset($model->upload)):?>
        <div class="form-group">
            <label>Image_Current</label>
            <?= Html::hiddenInput('current_upload', $model->upload); ?>
            <?= Html::img($model->getImageurl(), ['width'=>'150','height'=>'100', 'name' => 'current_upload', 'value' => $model->upload]) ?>
        </div>
    <?php endif; ?>

    <?= $form->field($model, 'upload')->fileInput() ?>
    <div class="form-group">
        <label>Cate_id</label>
        <?= Html::activeDropDownList($model,  'cate_id',
            ArrayHelper::map(Categories::find()->all(), 'id', 'name'), ['class' => 'form-control']) ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::submitButton('Ajax', ['class' => 'btn btn-success', 'id' => 'ajaxJob']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

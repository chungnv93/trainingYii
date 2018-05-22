<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Detail';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($post->title) ?></h1>

    <p>
        <?=  $post->description ?>
    </p>
    <div class="padding-box">
        <h2>Comment</h2>
        <?php
        if(isset($comments) && count($comments) > 0) {
            foreach($comments as $comment) {
                ?>
                <div class="col-sm-12 border-box">
                    <div class="col-sm-2">
                        <p class="title-name"><?= \common\models\User::findOne($comment->user_id)->username ?></p>
                    </div>
                    <div class="col-sm-9">
                        <?= $comment->content ?>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'content')->textarea() ?>
    <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    <?php $form1 = ActiveForm::end(); ?>

</div>

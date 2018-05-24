<?php
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?php Yii::$app->postcomponent->listPost(); ?></h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">


        <div class="row">
            <?= \frontend\widgets\ListPostWidget::widget(); ?>
            <?php require "globals.php"; ?>
        </div>

    </div>
</div>

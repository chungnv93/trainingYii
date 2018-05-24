<?php
/* @var $this yii\web\View */

$this->title = $category->name;
?>
<div class="site-index">

    <div class="jumbotron">
        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">


        <div class="row">
            <?php
            if(isset($posts) && count($posts) > 0) {
                foreach ($posts as $post) {
            ?>
                    <div class="col-lg-12">
                        <h2><?php echo $post->title ?> --- <?= $post->cate->name; ?></h2>

                        <p><?php echo $post->description ?></p>

                        <p><?php echo \yii\helpers\Html::a('Detail', array('site/detail', 'id' => $post->id ), array('class' => 'btn btn-primary')); ?></p>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

    </div>
</div>

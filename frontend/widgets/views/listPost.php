
<?php
    if(isset($posts) && count($posts) > 0) {
        foreach ($posts as $post) {
            ?>
            <div class="col-lg-12">
                <h2><?php echo $post->title ?> --- </h2>

                <p><?php echo $post->description ?></p>

                <p><?php echo \yii\helpers\Html::a('Detail', array('site/detail', 'id' => $post->id ), array('class' => 'btn btn-primary')); ?></p>
            </div>
        <?php
        }
    }
?>
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TestsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tests-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tests', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'content:ntext',
            array(
                'format' => 'html',
                'content' => function($data){
                $url = $data->getImageurl();
                return Html::img($url, ['width'=>'150','height'=>'100']);
                        }
            ),
            array(
                'format' => 'text',
                'content' => function($data) {
                        return $data->cate->name;
                }

            ),

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

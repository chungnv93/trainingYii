<?php


namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use common\models\Posts;
class ListPostWidget extends Widget {


    public function init() {
        parent::init();

    }

    public function run()
    {
        $model = new Posts;
        $posts = $model->getAllPost();
        return $this->render('listPost.php', ['posts' => $posts]);
    }

}
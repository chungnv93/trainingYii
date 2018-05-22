<?php


namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use common\models\Categories;
class TopBarWidget extends Widget {


    public function init() {
        parent::init();

    }

    public function run()
    {
        $categories = Categories::find()->all();
        return $this->render('listCategories.php', ['categories' => $categories]);
    }

}
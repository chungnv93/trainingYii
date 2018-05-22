<?php

namespace frontend\components;

use yii\base\Component;
use common\models\Categories;
class PostComponent extends Component {

    public function listPost() {
        $categories = Categories::find()->all();
        if(isset($categories) && count($categories) > 0) {
            foreach($categories as $category) {
                $menuItems[] = ['label' => $category->name, 'url' => ['/site/category', 'id' => $category->id]];
            }
        }
        return $menuItems;
    }

}
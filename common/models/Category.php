<?php

namespace common\models;
use yii\db\ActiveRecord;
class Category extends ActiveRecord {

    public static function tableName()
    {
        return 'categories';
    }

    public function getAllCategory() {
        return Category::find()->all();
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
        ];
    }
}
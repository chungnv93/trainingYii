<?php
namespace backend\controllers;
use yii\web\Controller;
use Yii;
use common\models\Category;
class CategoryController extends Controller {
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex() {
        $categories = Category::getAllCategory();
        return $this->render('/category/index', ['categories' => $categories]);
    }

    public function actionSave() {
        $request = Yii::$app->getRequest();
        if($request->post()){
            $params = $request->post();
            $model = new Category();
            $valid = $model->validate();
            if ($valid) {
                return $this->redirect('/category/index')->send();
            } else {
                return $this->render('/category/create', ['errors' => $model->getErrors()]);
            }
        } else {
            return $this->render('/category/create');
        }
    }
}
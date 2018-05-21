<?php
namespace backend\controllers;
use yii\web\Controller;
use Yii;
use common\models\Categories;
use Cocur\Slugify\Slugify;

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
        $categories = Categories::find()->all();
        return $this->render('/category/index', ['categories' => $categories]);
    }

    public function actionSave() {
        $model = new Categories();
        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            $request = Yii::$app->request->post();
            $slugify = new Slugify();
            $model->name = $request['Categories']['name'];
            $model->slug = $slugify->slugify($request['Categories']['name']);
            $model->save();
            Yii::$app->session->setFlash('success', 'Insert Data successfull');
        } 
            return $this->render('/category/create', ['model' => $model]);
    }
}
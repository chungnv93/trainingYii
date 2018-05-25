<?php

namespace api\controllers;

use Yii;
use common\models\Countries;
use api\models\CountriesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * CountryController implements the CRUD actions for Countries model.
 */
class CountryController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public $modelClass = "common\models\Countries";
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Countries models.
     * @return mixed
     */
    public function actionIndex()
    {
        return Countries::find()->all();
    }

    public function actionView($id) {
        $country = Countries::find()->where(['id' => $id])->one();
        return $country;
    }

    public function actionCreate() {
        $params = Yii::$app->request->post();
        $this->checkAccess('create',null, $params);
        $model = new Countries();
        $data = $model->create($params);
        if($data) {
            return $model->getCountryByZipcode($params['zipcode']);
        } else {
            throw new BadRequestHttpException('Insert Faild');
        }
    }

    public function actionUpdate($id) {
        $params = Yii::$app->request->bodyParams;
        $model = $this->findModel($id);
        $this->checkAccess('update', null, $params);
        $data = $model->getZipCodeById($id, $params['zipcode']);
        if($data > 0) {
            throw new \yii\web\ForbiddenHttpException('Zipcode Exists.');
        }
        $dataCheck = $model->updateData($params);
        if($dataCheck) {
            return $model->getCountryByZipcode($params['zipcode']);
        } else {
            throw new BadRequestHttpException('Insert Faild');
        }

    }

    protected function findModel($id)
    {
        if (($model = Countries::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        if ($action === 'create' or $action === 'update')
        {

            if(($params['name'] == '') || ($params['zipcode'] == '')) {
                throw new \yii\web\ForbiddenHttpException('Name or zip_code must not be empty.');
            }

        }
    }
}

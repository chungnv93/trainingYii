<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property int $id
 * @property string $name
 * @property int $zipcode
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'zipcode'], 'required'],
            [['zipcode'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'zipcode' => 'Zipcode',
        ];
    }

    public function getCountryByZipcode($zipcode) {
        return Countries::find()->where(['zipcode' => $zipcode])->one();
    }

    public function getZipCodeById($id, $zipcode) {
        return Countries::find()->where(['zipcode' => $zipcode ])->andWhere(['<>', 'id' , $id])->count();
    }

    public function create($data) {
        $this->checkZipcode($data['zipcode']);
        $this->name = $data['name'];
        $this->zipcode = $data['zipcode'];
        $check = $this->save();
        return $check;

    }

    public function updateData($data) {
        $this->name = $data['name'];
        $this->zipcode = $data['zipcode'];
        $checkSave = $this->save();
        return $checkSave;
    }

    public function checkZipcode($zipcode) {
        $data = Countries::find()->where(['zipcode' => $zipcode])->count();
        if($data > 0) {
            throw new \yii\web\ForbiddenHttpException('Zipcode Exists.');
        }
    }
}

<?php

namespace common\models;

use http\Url;
use Yii;

/**
 * This is the model class for table "tests".
 *
 * @property int $id
 * @property string $content
 * @property string $upload
 * @property int $cate_id
 *
 * @property Categories $cate
 */
class Tests extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'upload'], 'string'],
            [['content'] , 'required'],
            [['upload'], 'file', 'extensions' => 'png, jpg'],
            [['cate_id'], 'required'],
            [['cate_id'], 'integer'],
            [['cate_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['cate_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'upload' => 'Image',
            'cate_id' => 'Cate ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCate()
    {
        return $this->hasOne(Categories::className(), ['id' => 'cate_id']);
    }

    public function getImageurl()
    {
        return Yii::$app->urlManagerImageBackend->createUrl('uploads').'/'.$this->upload;
    }

}

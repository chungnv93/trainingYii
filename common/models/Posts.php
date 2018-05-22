<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $cate_id
 *
 * @property Categories $cate
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['cate_id'], 'required'],
            [['cate_id'], 'integer'],
            [['title'], 'string', 'max' => 200],
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
            'title' => 'Title',
            'description' => 'Description',
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

    public function getAllPost() {
        return Posts::find()->all();
    }

    public function getByIdPost($id) {
        return Posts::findOne($id);
    }
}

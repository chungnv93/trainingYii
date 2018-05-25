<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "demos".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $cate_id
 */
class Demo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'demos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['cate_id'], 'required'],
            [['cate_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
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
            'content' => 'Content',
            'cate_id' => 'Cate ID',
        ];
    }
}

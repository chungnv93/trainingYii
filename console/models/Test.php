<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tests".
 *
 * @property int $id
 * @property string $content
 * @property string $image
 */
class Test extends \yii\db\ActiveRecord
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
            [['content', 'image'], 'string'],
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
            'image' => 'Image',
        ];
    }
}

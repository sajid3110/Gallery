<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $cid
 * @property string $cname
 *
 * @property AlbumCategory[] $albumCategories
 * @property Photos[] $photos
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cname'], 'required'],
            [['cname'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cid' => 'Cid',
            'cname' => 'Cname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumCategories()
    {
        return $this->hasMany(AlbumCategory::className(), ['cid' => 'cid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photos::className(), ['cid' => 'cid']);
    }
}

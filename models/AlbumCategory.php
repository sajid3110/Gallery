<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "album_category".
 *
 * @property integer $aid
 * @property integer $cid
 *
 * @property Categories $c
 * @property Album $a
 */
class AlbumCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'album_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aid', 'cid'], 'required'],
            [['aid', 'cid'], 'integer'],
            [['cid'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['cid' => 'cid']],
            [['aid'], 'exist', 'skipOnError' => true, 'targetClass' => Album::className(), 'targetAttribute' => ['aid' => 'aid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'aid' => 'Aid',
            'cid' => 'Cid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(Categories::className(), ['cid' => 'cid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getA()
    {
        return $this->hasOne(Album::className(), ['aid' => 'aid']);
    }
}

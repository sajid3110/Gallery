<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "album".
 *
 * @property integer $aid
 * @property integer $aname
 * @property integer $userid
 *
 * @property Users $user
 * @property AlbumCategory[] $albumCategories
 */
class Album extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'album';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aname', 'userid'], 'required'],
            [['userid'], 'integer'],
            ['aname' , 'string'],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['userid' => 'userid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'aid' => 'Album ID',
            'aname' => 'Album Name',
            'userid' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['userid' => 'userid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumCategories()
    {
        return $this->hasMany(AlbumCategory::className(), ['aid' => 'aid']);
    }
}

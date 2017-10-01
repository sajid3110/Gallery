<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photos".
 *
 * @property integer $pid
 * @property string $pname
 * @property integer $cid
 * @property string $plink
 *
 * @property Categories $c
 */
class Photos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'photos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pname', 'cid'], 'required'],
            [['cid'], 'integer'],
            [['plink'], 'string'],
            ['plink' , 'required'],
            ['file','file'],
            [['pname'], 'string', 'max' => 50],
            [['cid'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['cid' => 'cid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pid' => 'Pid',
            'pname' => 'Photo Name',
            'cid' => 'Category',
            'plink' => 'Photo',
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['plink'];
        return $scenarios;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(Categories::className(), ['cid' => 'cid']);
    }
}

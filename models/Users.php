<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $userid
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $password
 *
 * @property Album[] $albums
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'email', 'password'], 'required'],
            [['password'], 'string'],
            [['name'], 'string', 'max' => 25],
            [['phone'], 'number'],
            [['email'], 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public static function findByUsername($email)
    {
        return self::findOne(['email' => $email]);
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public function getAlbums()
    {
        return $this->hasMany(Album::className(), ['userid' => 'userid']);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new \yii\base\NotSupportedException();
    }

    public function getId()
    {
        return $this->userid;
    }

    public function getAuthKey()
    {
        throw new \yii\base\NotSupportedException();
    }

    public function validateAuthKey($authKey)
    {
        throw new \yii\base\NotSupportedException();
    }
}

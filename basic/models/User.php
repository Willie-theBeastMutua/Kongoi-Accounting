<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class User extends ActiveRecord  implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $dpassword;
    public $authKey;
    public $accessToken;

    public static function tableName()
    {
        return '{{%user}}';
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['userId' => $id]);
    }

    /**
     * {@inheritdoc}
     */
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        
        return static::findOne(['userName'=> $username]);
    }
    public static function findByPassword($password)
    {
        return static::findOne(['password'=>$password]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimarykey();
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        $model = new LoginForm();
        return Yii::$app->security->validatePassword($password, $model->getPassword());
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    public function getAuthKey()
    {
        //return $this->auth_key;
    }
    public function validateAuthKey($authKey)
    {
        //sreturn $this->getAuthKey() === $authKey;
    }

}

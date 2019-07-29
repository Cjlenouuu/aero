<?php

namespace app\models;

class User extends Users implements \yii\web\IdentityInterface
{

    public static function findIdentity($id)
{
    return static::findOne($id);
}

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

        return static::findOne(['access_token' => $token]);
    }

    public static function findByLogin($login)
    {

        return static::findOne(['login' => $login]);
    }


    public function getId()
    {
        return $this->id_user;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($auth_key)
    {
        return $this->auth_key === $auth_key;
    }


    public function validatePassword($pass)
    {
        return $this->pass === $pass;
    }
}

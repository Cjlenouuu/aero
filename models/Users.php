<?php

namespace app\models;

use Yii;

class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['login', 'pass'], 'required'],
            [['login', 'name'], 'string', 'max' => 255],
            [['pass'], 'string', 'max' => 100],
            [['auth_key', 'auth_token'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'ID',
            'login' => 'Login',
            'pass' => 'Pass',
            'name' => 'Name',
            'auth_key' => 'Auth Key',
            'auth_token' => 'Auth Token',
        ];
    }
}

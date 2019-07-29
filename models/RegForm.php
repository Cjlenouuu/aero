<?php
namespace app\models;
use app\controllers\UserController;
use yii\db\ActiveRecord;

class RegForm extends ActiveRecord
{
    public static function tableName()
    {
        return 'users';
    }
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'login' => 'Логин',
            'pass' => 'Пароль',

        ];
    }
    public function rules()
    {
        return [
            [['name', 'login', 'pass'], 'required'],

            [['name', 'login', 'pass'], 'trim'],
            ['name', 'string', 'min' => 2],
            [['name', 'login'], 'string', 'max' => 20],
            ['pass', 'string', 'max' => 32],

        ];
    }
}
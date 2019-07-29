<?php
namespace app\models;

use yii\base\Model;

class MybookingForm extends Model
{
    public $id_user;
    public function rules()
    {
        return [

            [['$id_user'], 'required'],

        ];
    }

}
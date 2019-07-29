<?php
namespace app\models;

use yii\base\Model;

class CancelForm extends Model
{
    public $id_user;
    public $id_booking;

    public function rules()
    {
        return [

            [['$id_user', '$id_route'], 'required'],

        ];
    }
}
<?php

namespace app\models;

use yii\base\Model;

class BookingForm extends Model
{
    public $id_user;
    public $id_route;
    public function rules()
    {
        return [

         [['$id_user', '$id_route'], 'required'],

        ];
    }

}
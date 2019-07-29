<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\BookingForm;
use app\models\Booking;
use app\models\Route;
use app\models\MybookingForm;
use app\models\CancelForm;


class BookingController extends Controller
{
    public function actionBooking()
    {
        $model = new BookingForm();
        $tableB = new Booking();
        $model->id_user = Yii::$app->user->identity->id;
        $model->id_route = Yii::$app->request->get('id_route');
        $route = Route::findOne("$model->id_route");
        $query = Booking::find()->where(['id_user'=> "$model->id_user"]);
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);
        $bookings = $query->orderBy('id_booking')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        if (Yii::$app->request->post('submit')==='done')
        {
            $tableB->id_user = $model->id_user;
            $tableB->id_route = $model->id_route;
            $route->sum_ticket= $route -> sum_ticket - 1;

            $tableB->save();
            $route->save();
            return $this->render('bysucces', ['model' => $model]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('booking', ['route' => $route,'model' => $model]);
        }
    }

    public function actionCancel()
    {
        $model = new CancelForm();
        $model->id_user = Yii::$app->user->identity->id;
        $model->id_booking = Yii::$app->request->get('id_booking');
        $booking = Booking::find()->where(['id_booking' => "$model->id_booking"])->one();
        $route =  Route::find()->where(['id_route' => "$booking->id_route"])->one();


        if (Yii::$app->request->post('submit')==='done')
        {
            $route->sum_ticket= $route -> sum_ticket + 1;
            $route->save();
            $booking->delete();
            return $this->render('succes', ['model' => $model,
            ]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('cancel', ['booking' => $booking,'model' => $model]);
        }

    }
    public function actionMybooking()
    {
        $model = new  MybookingForm();
        $model->id_user = Yii::$app->user->identity->id;
        $query = Booking::find()->where(['id_user'=> "$model->id_user"]);
        $query1 = Route::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $bookings = $query->orderBy('id_booking')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
        $routes = $query1->where(['id_route' => "bookings->id_route"])->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('mybooking', ['routes' => $routes, 'bookings' => $bookings,
            'pagination' => $pagination,
        ]);
    }

}

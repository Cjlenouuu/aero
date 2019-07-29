<?php

namespace app\controllers;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Route;

class RouteController extends Controller
{
    public function actionIndex()
    {
        $query = Route::find();
        $query->where('sum_ticket!=0');

        $pagination = new Pagination([
        'defaultPageSize' => 10,
        'totalCount' => $query->count(),
    ]);
    $routes = $query->orderBy('date')->offset($pagination->offset)->limit($pagination->limit)->all();
    return $this->render('index', ['routes' => $routes,
    'pagination' => $pagination,
    ]);
    }
     public function actionNoreg()
        {
            $query = Route::find();
            $query->where('sum_ticket!=0');

            $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);
        $routes = $query->orderBy('date')->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('noreg', ['routes' => $routes,
        'pagination' => $pagination,
        ]);
        }
}

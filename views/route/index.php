<?php
use yii\helpers\html;
use yii\widgets\LinkPager;
?>
<h1>Маршруты</h1>
<ul>
    <?php foreach($routes as $route): ?>
    <li>
        <a href="http://aero.flot/basic/web/booking/booking?id_route=<?=$route->id_route; ?>"> <?= Html::encode("{$route->id_route} {$route->from_place} -> {$route->in_place} : 
        Цена {$route->cost} Дата отправления {$route->date} Кол-во мест {$route->sum_ticket}") ?> </a>
    </li>
    <?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>

<?php
use yii\helpers\html;
use yii\widgets\LinkPager;
?>
<h1>Маршруты</h1>
<ul>
    <?php foreach($routes as $route): ?>
        <li>
            <?= Html::encode("{$route->id_route} {$route->from_place} -> {$route->in_place} : 
        Цена {$route->cost} Дата отправления {$route->date} Кол-во мест {$route->sum_ticket}") ?>
        </li>
    <?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>

<?php
use yii\helpers\html;
use yii\widgets\LinkPager;
?>
<h1>Мои билеты</h1>
<ul>
    <?php
    foreach($bookings as $booking): ?>
        <li>
            <a href="http://aero.flot/basic/web/booking/cancel?id_booking=<?=$booking->id_booking; ?>"> <?= Html::encode("{$booking->id_booking} {$booking->id_user} Дата отправления:  {$routes->date} Время покупки:  {$booking->date_by}")?> </a>
        </li>
        <?php endforeach; ?>

</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>

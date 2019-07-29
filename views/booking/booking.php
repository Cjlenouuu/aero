<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<p>Вы выбради следующий маршрут</p>

<ul>

    <?= Html::encode("{$route->from_place} -> {$route->in_place} : 
        Цена {$route->cost} Дата отправления {$route->date}") ?>
</ul>

<?php $form = ActiveForm::begin(); ?>


    <div class="form-group">

        <?= Html::submitButton('Купить', ['value' => 'done', 'name' => 'submit', 'class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>


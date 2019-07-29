<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<p>Ваш билет</p>

<ul>

    <?= Html::encode("Номер билета: {$booking->id_booking} Номер пути -> {$booking->id_route} ") ?>
</ul>

<?php $form = ActiveForm::begin(); ?>


<div class="form-group">

    <?= Html::submitButton('Отменить броинрование', ['value' => 'done', 'name' => 'submit', 'class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>


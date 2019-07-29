<?php use yii\widgets\ActiveForm;
use yii\helpers\Html;


$form=ActiveForm::begin();

?>
<?= $form->field($model,'login');?>
<?= $form->field($model,'name');?>
<?= $form->field($model,'pass')->passwordInput();?>

<?= Html::submitButton('Отправить',['name'=>'submit','value'=>'done','class'=>'btn btn-success']);?>

<?//= Html::submitButton('Назад',['name'=>'submit','value'=>'cancel','class'=>'btn btn-danger']);?>
<?php ActiveForm::end();?>
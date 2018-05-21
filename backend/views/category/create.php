<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<br />
<br />
<br />
<br />
<h2>Create Category</h2>
<?php echo \yii\helpers\Html::a('Back', ['category/index'], array('class' => 'btn btn-primary')) ?>



<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'name') ?>

<?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
<?php $form1 = ActiveForm::end(); ?>

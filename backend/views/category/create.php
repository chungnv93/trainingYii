<h2>Create Category</h2>
<?php echo \yii\helpers\Html::a('Back', ['category/index'], array('class' => 'btn btn-primary')) ?>

<?php
    if(isset($errors)) {
        ?>
        <div class="alert alert-danger">
            <?php foreach($errors as $error) { ?>
                <p><?php echo $error[0]; ?></p>
            <?php } ?>
        </div>
        <?php
    }
?>
<?php  \yii\widgets\ActiveForm::begin(); ?>
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Add</button>
<?php \yii\widgets\ActiveForm::end(); ?>
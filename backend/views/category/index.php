<h2>Category</h2>
<?php echo \yii\helpers\Html::a('Create New Post', array('category/save'), array('class' => 'btn btn-primary')); ?>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Action</th>
    </tr>
    <?php
        if(count($categories) > 0) {
            foreach ($categories as $category) {
                ?>
                <tr>
                    <td><?php echo $category->id ?></td>
                    <td><?php echo $category->name ?></td>
                    <td><?php echo $category->slug ?></td>
                    <td>
                        <a href=""></a>
                    </td>
                </tr>
                <?php
            }
        }else {
            ?>
            Không có dữ liệu!!!
    <?php
        }
    ?>
</table>
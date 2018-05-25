<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/24/2018
 * Time: 2:18 PM
 */
namespace backend\widgets;
use yii\helpers\Html;

class SibarWidget extends \yii\base\Widget {

    public function run() {
        return $this->render('sidebar.php');
    }
}
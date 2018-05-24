<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/23/2018
 * Time: 10:19 AM
 */
use yii\base\Event;
function caculateLength(Event $event) {
    echo strlen($event->data);
}

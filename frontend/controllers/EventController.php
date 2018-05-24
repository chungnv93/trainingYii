<?php
namespace frontend\controllers;
use yii\base\Event;
class EventController extends \yii\web\Controller {

    const EVENT_DEMO = 'hello';

    public function actionGlobal() {
        $this->on(self::EVENT_DEMO, 'caculateLength', 'Hello');
        $this->trigger(self::EVENT_DEMO);
        $this->off(self::EVENT_DEMO);
    }
}
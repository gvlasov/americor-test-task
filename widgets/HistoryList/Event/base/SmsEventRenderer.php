<?php

namespace app\widgets\HistoryList\Event\base;

use app\models\Sms;
use app\widgets\HistoryList\EventRenderer;
use Yii;

abstract class SmsEventRenderer extends EventRenderer
{

    public function renderForList()
    {
        return $this->render('_item_common', [
            'user' => $this->model->user,
            'body' => $this->getBodyHtml(),
            'footer' => $this->model->sms->direction == Sms::DIRECTION_INCOMING ?
                Yii::t('app', 'Incoming message from {number}', [
                    'number' => $this->model->sms->phone_from ?? ''
                ]) : Yii::t('app', 'Sent message to {number}', [
                    'number' => $model->sms->phone_to ?? ''
                ]),
            'iconIncome' => $this->model->sms->direction == Sms::DIRECTION_INCOMING,
            'footerDatetime' => $this->model->ins_ts,
            'iconClass' => 'icon-sms bg-dark-blue'
        ]);
    }

    public function getBodyHtml()
    {
        return $this->model->sms->message ? $this->model->sms->message : '';
    }
}
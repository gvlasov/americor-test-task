<?php

namespace app\widgets\HistoryList\Event\base;

use app\models\Call;
use app\widgets\HistoryList\EventRenderer;

abstract class CallEventRenderer extends EventRenderer
{

    public function renderForList()
    {
        $call = $this->model->call;
        $answered = $call && $call->status == Call::STATUS_ANSWERED;

        return $this->render('_item_common', [
            'user' => $this->model->user,
            'content' => $call->comment ?? '',
            'body' => $this->getBodyHtml(),
            'footerDatetime' => $this->model->ins_ts,
            'footer' => isset($call->applicant) ? "Called <span>{$call->applicant->name}</span>" : null,
            'iconClass' => $answered ? 'md-phone bg-green' : 'md-phone-missed bg-red',
            'iconIncome' => $answered && $call->direction == Call::DIRECTION_INCOMING
        ]);
    }

    public function getBodyHtml()
    {
        $call = $this->model->call;
        return ($call ? $call->totalStatusText . ($call->getTotalDisposition(false) ? " <span class='text-grey'>" . $call->getTotalDisposition(false) . "</span>" : "") : '<i>Deleted</i> ');
    }
}
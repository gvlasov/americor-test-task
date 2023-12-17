<?php

namespace app\widgets\HistoryList\Event\base;

use app\widgets\HistoryList\EventRenderer;

abstract class TaskEventRenderer extends EventRenderer
{

    public function renderForList()
    {
        $task = $this->model->task;
        return $this->render('_item_common', [
            'user' => $this->model->user,
            'body' => $this->getBodyHtml(),
            'iconClass' => 'fa-check-square bg-yellow',
            'footerDatetime' => $this->model->ins_ts,
            'footer' => isset($task->customerCreditor->name) ? "Creditor: " . $task->customerCreditor->name : ''
        ]);
    }

    public function getBodyHtml()
    {
        $task = $this->model->task;
        return "{$this->model->eventText}: " . ($task->title ?? '');
    }
}
<?php

namespace app\widgets\HistoryList\Event;

use app\widgets\HistoryList\EventRenderer;

class GenericEventRenderer extends EventRenderer
{

    public function renderForList()
    {
        return $this->render('_item_common', [
            'user' => $this->model->user,
            'body' => $this->getBodyHtml(),
            'bodyDatetime' => $this->model->ins_ts,
            'iconClass' => 'fa-gear bg-purple-light'
        ]);
    }

    public function getBodyHtml()
    {
        return $this->model->eventText;
    }
}
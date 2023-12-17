<?php

namespace app\widgets\HistoryList\Event;

use app\widgets\HistoryList\Event\base\CustomerChangeEventRenderer;

class CustomerChangeTypeEventRenderer extends CustomerChangeEventRenderer
{

    protected function getAttribute()
    {
        return 'type';
    }

}
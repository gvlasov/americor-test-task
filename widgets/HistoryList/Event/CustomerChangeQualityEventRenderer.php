<?php

namespace app\widgets\HistoryList\Event;

use app\widgets\HistoryList\Event\base\CustomerChangeEventRenderer;

class CustomerChangeQualityEventRenderer extends CustomerChangeEventRenderer
{

    protected function getAttribute()
    {
        return 'quality';
    }

}
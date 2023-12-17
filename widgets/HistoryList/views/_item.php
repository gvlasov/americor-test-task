<?php

use app\models\search\HistorySearch;
use app\widgets\HistoryList\EventRendererFactory;

/** @var $model HistorySearch */

echo (new EventRendererFactory())
    ->createEventRenderer($model)
    ->renderForList();
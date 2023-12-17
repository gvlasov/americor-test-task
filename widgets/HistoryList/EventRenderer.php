<?php

namespace app\widgets\HistoryList;

use app\models\History;
use yii\base\Widget;

abstract class EventRenderer extends Widget
{

    /** @var History */
    public $model;

    public abstract function getBodyHtml();

    public abstract function renderForList();

}
<?php

namespace app\widgets\HistoryList\Event\base;

use app\models\Customer;
use app\widgets\HistoryList\EventRenderer;

abstract class CustomerChangeEventRenderer extends EventRenderer
{

    public function getBodyHtml()
    {
        return "{$this->model->eventText} " .
            (Customer::getTypeTextByType($this->model->getDetailOldValue($this->getAttribute())) ?? "not set") . ' to ' .
            (Customer::getTypeTextByType($this->model->getDetailNewValue($this->getAttribute())) ?? "not set");
    }

    protected abstract function getAttribute();

    public function renderForList()
    {
        return $this->render('_item_statuses_change', [
            'model' => $this->model,
            'oldValue' => Customer::getTypeTextByType($this->model->getDetailOldValue($this->getAttribute())),
            'newValue' => Customer::getTypeTextByType($this->model->getDetailNewValue($this->getAttribute()))
        ]);
    }
}
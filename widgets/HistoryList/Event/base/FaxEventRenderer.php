<?php

namespace app\widgets\HistoryList\Event\base;

use app\widgets\HistoryList\EventRenderer;
use Yii;
use yii\helpers\Html;

abstract class FaxEventRenderer extends EventRenderer
{

    public function renderForList()
    {
        $fax = $this->model->fax;
        return $this->render('_item_common', [
            'user' => $this->model->user,
            'body' => $this->getBodyHtml(),
            ' - ' .
            (isset($fax->document) ? Html::a(
                Yii::t('app', 'view document'),
                $fax->document->getViewUrl(),
                [
                    'target' => '_blank',
                    'data-pjax' => 0
                ]
            ) : ''),
            'footer' => Yii::t('app', '{type} was sent to {group}', [
                'type' => $fax ? $fax->getTypeText() : 'Fax',
                'group' => isset($fax->creditorGroup) ? Html::a($fax->creditorGroup->name, ['creditors/groups'], ['data-pjax' => 0]) : ''
            ]),
            'footerDatetime' => $this->model->ins_ts,
            'iconClass' => 'fa-fax bg-green'
        ]);
    }

    public function getBodyHtml()
    {
        return $this->model->eventText;
    }
}
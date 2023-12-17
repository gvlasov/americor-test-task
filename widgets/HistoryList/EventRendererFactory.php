<?php

namespace app\widgets\HistoryList;

use app\models\History;
use app\widgets\HistoryList\Event\GenericEventRenderer;
use yii\helpers\Inflector;

class EventRendererFactory
{

    /**
     * @param History $model
     * @return EventRenderer
     */
    function createEventRenderer($model)
    {
        $class = __NAMESPACE__ . '\\Event\\' . Inflector::camelize($model->event) . 'EventRenderer';
        if (!class_exists($class)) {
            $class = GenericEventRenderer::class;
        }
        return new $class(['model' => $model]);
    }

}
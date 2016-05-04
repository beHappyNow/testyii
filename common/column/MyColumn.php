<?php
namespace common\column;

use yii\grid\DataColumn;

class MyColumn extends DataColumn
{
    protected function renderDataCellContent($model, $key, $index)
    {
        if ($this->content === null) {
//            return $this->grid->formatter->format($this->getDataCellValue($model, $key, $index), $this->format);
            return $model->editCityURL;
        } else {
            return parent::renderDataCellContent($model, $key, $index);
        }
    }
}

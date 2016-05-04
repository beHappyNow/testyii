<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Cities */

$this->title = $model->city_name;
$this->params['breadcrumbs'][] = ['label' => 'Cities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cities-view">

    <h1><?= Html::encode($this->title) ?></h1>
<!--    --><?php //foreach($langs as $l): ?>
<!--    --><?//= $l->lang_name ?>
<!--    --><?php //endforeach; ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'city_name',
            'country.country_name',
//            'cityLangs',
        ],
    ]) ?>

<?//= ListView::widget([
//        'dataProvider' => $langs,
//        'itemView' => '_lang',
//    ]); ?>
</div>

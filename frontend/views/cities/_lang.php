<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="post">
    <h2><?= Html::encode($model->id) ?></h2>

    <?php foreach($dataProvider as $l): ?>
        <?= $l->lang_name ?>
    <?php endforeach; ?>
</div>
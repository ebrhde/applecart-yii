<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Teaser */

$this->title = 'Изменить специальное предложение';
$this->params['breadcrumbs'][] = ['label' => 'Специальные предложения', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="feedback-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

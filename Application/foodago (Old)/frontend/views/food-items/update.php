<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Food_Items */

$this->title = 'Update Food  Items: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Food  Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id, 'restaurant_id' => $model->restaurant_id, 'sub_category_id' => $model->sub_category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="food--items-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

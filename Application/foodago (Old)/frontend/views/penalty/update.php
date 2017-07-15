<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Penalty */

$this->title = 'Update Penalty: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Penalties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'user_id' => $model->user_id, 'user_user_type_id' => $model->user_user_type_id, 'order_id' => $model->order_id, 'order_delivery_status_id' => $model->order_delivery_status_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penalty-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

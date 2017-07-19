<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Penalty */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Penalties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penalty-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'user_id' => $model->user_id, 'user_user_type_id' => $model->user_user_type_id, 'order_id' => $model->order_id, 'order_delivery_status_id' => $model->order_delivery_status_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'user_id' => $model->user_id, 'user_user_type_id' => $model->user_user_type_id, 'order_id' => $model->order_id, 'order_delivery_status_id' => $model->order_delivery_status_id], [
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
            'amount',
            'user_id',
            'user_user_type_id',
            'order_id',
            'order_delivery_status_id',
        ],
    ]) ?>

</div>

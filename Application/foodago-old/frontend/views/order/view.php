<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'delivery_status_id' => $model->delivery_status_id, 'user_id' => $model->user_id, 'user_user_type_id' => $model->user_user_type_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'delivery_status_id' => $model->delivery_status_id, 'user_id' => $model->user_id, 'user_user_type_id' => $model->user_user_type_id], [
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
            'total_amt',
            'timestamp',
            'tracking_number',
            'delivery_status_id',
            'user_id',
            'user_user_type_id',
        ],
    ]) ?>

</div>

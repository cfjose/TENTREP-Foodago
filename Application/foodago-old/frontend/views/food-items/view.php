<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Food_Items */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Food  Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="food--items-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'restaurant_id' => $model->restaurant_id, 'sub_category_id' => $model->sub_category_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'restaurant_id' => $model->restaurant_id, 'sub_category_id' => $model->sub_category_id], [
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
            'name',
            'price',
            'calorie_count',
            'restaurant_id',
            'sub_category_id',
        ],
    ]) ?>

</div>

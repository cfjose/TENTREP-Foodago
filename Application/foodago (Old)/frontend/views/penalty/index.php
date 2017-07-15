<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenaltySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penalties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penalty-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Penalty', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'amount',
            'user_id',
            'user_user_type_id',
            'order_id',
            // 'order_delivery_status_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

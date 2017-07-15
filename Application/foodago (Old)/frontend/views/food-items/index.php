<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FoodItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Food  Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="food--items-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Food  Items', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'price',
            'calorie_count',
            'restaurant_id',
            // 'sub_category_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

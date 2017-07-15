<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Food_Items */

$this->title = 'Create Food  Items';
$this->params['breadcrumbs'][] = ['label' => 'Food  Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="food--items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

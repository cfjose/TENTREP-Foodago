<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Delivery_Status */

$this->title = 'Create Delivery  Status';
$this->params['breadcrumbs'][] = ['label' => 'Delivery  Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery--status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

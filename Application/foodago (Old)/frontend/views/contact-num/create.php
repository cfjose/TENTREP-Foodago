<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Contact_Num */

$this->title = 'Create Contact  Num';
$this->params['breadcrumbs'][] = ['label' => 'Contact  Nums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact--num-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

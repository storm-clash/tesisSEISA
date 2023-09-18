<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Alturamontaje */

//$this->title = 'Create Alturamontaje';
$this->params['breadcrumbs'][] = ['label' => 'Alturamontajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alturamontaje-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

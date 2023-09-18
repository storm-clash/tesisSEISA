<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Condambsegelect */

//$this->title = 'Create Condambsegelect';
$this->params['breadcrumbs'][] = ['label' => 'Condambsegelects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="condambsegelect-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

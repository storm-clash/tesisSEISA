<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Condambsistfijos */

//$this->title = 'Create Condambsistfijos';
$this->params['breadcrumbs'][] = ['label' => 'Condambsistfijos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="condambsistfijos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

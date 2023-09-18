<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Perimetralmalla */

//$this->title = 'Create Perimetralmalla';
$this->params['breadcrumbs'][] = ['label' => 'Perimetralmallas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perimetralmalla-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

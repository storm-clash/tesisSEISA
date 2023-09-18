<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Complejidadsistfijos */

//$this->title = 'Create Complejidadsistfijos';
$this->params['breadcrumbs'][] = ['label' => 'Complejidadsistfijos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="complejidadsistfijos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

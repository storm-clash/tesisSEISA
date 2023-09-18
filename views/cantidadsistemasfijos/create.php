<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cantidadsistemasfijos */

//$this->title = 'Create Cantidadsistemasfijos';
$this->params['breadcrumbs'][] = ['label' => 'Cantidadsistemasfijos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cantidadsistemasfijos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

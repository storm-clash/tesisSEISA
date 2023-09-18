<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cantdispositivos */

//$this->title = 'Create Cantdispositivos';
$this->params['breadcrumbs'][] = ['label' => 'Cantdispositivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cantdispositivos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ofertaitems */

$this->title = 'Create Ofertaitems';
$this->params['breadcrumbs'][] = ['label' => 'Ofertaitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ofertaitems-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

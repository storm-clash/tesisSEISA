<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Responsables */

$this->title = 'Create Responsables';
$this->params['breadcrumbs'][] = ['label' => 'Responsables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="responsables-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

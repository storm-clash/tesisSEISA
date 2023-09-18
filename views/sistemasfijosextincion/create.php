<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sistemasfijosextincion */

$this->title = 'Create Sistemasfijosextincion';
$this->params['breadcrumbs'][] = ['label' => 'Sistemasfijosextincions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sistemasfijosextincion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

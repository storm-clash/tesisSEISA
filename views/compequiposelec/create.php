<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Compequiposelec */

//$this->title = 'Create Compequiposelec';
$this->params['breadcrumbs'][] = ['label' => 'Compequiposelecs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compequiposelec-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

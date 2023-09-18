<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Registromantenimientos */

//$this->title = 'Create Registromantenimientos';
$this->params['breadcrumbs'][] = ['label' => 'Registromantenimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registromantenimientos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

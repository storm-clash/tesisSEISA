<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Formaspago */

//$this->title = 'Create Formaspago';
$this->params['breadcrumbs'][] = ['label' => 'Formaspagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formaspago-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

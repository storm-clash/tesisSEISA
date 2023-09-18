<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tamanobajante */

//$this->title = 'Create Tamanobajante';
$this->params['breadcrumbs'][] = ['label' => 'Tamanobajantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tamanobajante-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

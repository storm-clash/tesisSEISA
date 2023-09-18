<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Altura */

//$this->title = 'Create Altura';
$this->params['breadcrumbs'][] = ['label' => 'Alturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="altura-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

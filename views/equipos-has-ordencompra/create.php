<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EquiposHasOrdencompra */

$this->title = 'Create Equipos Has Ordencompra';
$this->params['breadcrumbs'][] = ['label' => 'Equipos Has Ordencompras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipos-has-ordencompra-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ordencompra */

$this->title = 'Create Ordencompra';
$this->params['breadcrumbs'][] = ['label' => 'Ordencompras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordencompra-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

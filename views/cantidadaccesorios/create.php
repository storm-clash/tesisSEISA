<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cantidadaccesorios */

//$this->title = 'Create Cantidadaccesorios';
$this->params['breadcrumbs'][] = ['label' => 'Cantidadaccesorios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cantidadaccesorios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

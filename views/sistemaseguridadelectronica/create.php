<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sistemaseguridadelectronica */

$this->title = 'Create Sistemaseguridadelectronica';
$this->params['breadcrumbs'][] = ['label' => 'Sistemaseguridadelectronicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sistemaseguridadelectronica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,

    ]) ?>

</div>

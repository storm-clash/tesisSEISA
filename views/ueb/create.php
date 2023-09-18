<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ueb */

//$this->title = 'Create Ueb';
$this->params['breadcrumbs'][] = ['label' => 'Uebs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ueb-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nivelessepresores */

//$this->title = 'Create Nivelessepresores';
$this->params['breadcrumbs'][] = ['label' => 'Nivelessepresores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nivelessepresores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

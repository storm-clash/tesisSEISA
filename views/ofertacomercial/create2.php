<?php

use app\models\Ofertacomercial;
use yii\helpers\Html;
use yii\web\View;


/* @var $this yii\web\View */
/* @var $model app\models\Ofertacomercial */

//$this->title = 'Create Oferta Comercial';
$this->params['breadcrumbs'][] = ['label' => 'Ofertacomercials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
//$var=\app\models\Clasificarentidad::findOne($model->cliente_idcliente);
//$id=$var[1];
?>
<div class="ofertacomercial-create">





        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form2', [
            'model' => $model,

        ]) ?>



</div>


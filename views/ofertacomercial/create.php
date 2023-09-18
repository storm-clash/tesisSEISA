<?php

use yii\helpers\Html;
use app\models\Ofertaitems;


/* @var $this yii\web\View */
/* @var $model app\models\Ofertacomercial */

//$this->title = 'Create Ofertacomercial';
$this->params['breadcrumbs'][] = ['label' => 'Ofertacomercials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$modelsItems=new Ofertaitems();

//$request=Yii::$app->request;
//$idcliente=$request->getBodyParam('idcliente');


//$var=\app\models\Clasificarentidad::find()->where(['idclasificarEntidad'=>$idcliente])->all();
//$id=reset($var);
?>
<div class="ofertacomercial-create">




    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        //'modelsItems'=>$modelsItems,

    ]) ?>



</div>

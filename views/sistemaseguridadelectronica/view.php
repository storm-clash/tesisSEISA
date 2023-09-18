<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sistemaseguridadelectronica */

$this->title = $model->idsistemaSeguridadElectronica;
$this->params['breadcrumbs'][] = ['label' => 'Sistemaseguridadelectronicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sistemaseguridadelectronica-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idsistemaSeguridadElectronica], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idsistemaSeguridadElectronica], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idsistemaSeguridadElectronica',
            'sistemasIntalados_idsistemasIntalados',
            'cantSistemas_id',
            'cantDispositivos_id',
            'compEquiposElec_id',
            'altura_id',
            'condambSegElect_id',
            'obstruccionEquipo_id',
        ],
    ]) ?>

</div>

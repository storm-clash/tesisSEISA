<?php

use app\models\Clasificarentidad;
use app\models\Cliente;
use app\models\Sistemasintalados;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\BootstrapAsset;
use yii\helpers\Url;


?>
<?php
$request=Yii::$app->request;
$id=$request->get('id');



$oferta=\app\models\Ofertacomercial::findOne($id);
$cliente=Cliente::find()->where(['idcliente'=>$oferta['cliente_idcliente']])->one();
$modelSistemas=Sistemasintalados::find()->where(['cliente_idcliente'=>$oferta['cliente_idcliente']])->all();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PDF</title>
    <link rel="stylesheet" href="<?=Url::to('@web/css/style.css')?>" type="text/css" >
    <link rel="stylesheet" href="<?=$this->registerCssFile('../../web/css/style.css')?>" type="text/css" >
    <link rel="stylesheet" href="<?=Yii::$app->request->baseUrl?> @web/css/style.css" type="text/css" >
    <link rel="stylesheet" href="style.css" type="text/css"  />



</head>
<body>
<header class="clearfix">
    <div id="logo">
        <?=Html::img('/img/favicon6.png',['width'=>'5%'])?>
    </div>
    <h1>Oferta No.<?php echo $oferta['cliente_idcliente']?> </h1>
    <div id="company" class="clearfix">
        <div>Empresa de Servicios de Seguridad Integral, S.A. (SEISA)</div>
        <div>Ave.47 No.3413 E/34 y 36,<br /> Reparto Koly, Playa, Cuba</div>
        <div>(537) 227-7128</div>
        <div><a href="mailto:negocios@seisa.cu">negocios@seisa.cu</a></div>
    </div>
    <div id="project">
        <div><span>PROYECTO :</span> Oferta Comercial</div>
        <div><span>CLIENTE :</span> <?php echo $cliente['nombreCliente']?></div>
        <div><span>DIRECCION :</span><?php echo $cliente['direccion']?></div>
        <div><span>No. DOCUMENTO :</span><?php echo $oferta['numeroDoc']?></div>
        <div><span>FECHA ELABORADA :</span><?php echo $oferta['fecha']?></div>
        <div><span>FECHA VENCIMIENTO :</span><?php echo $oferta['fechaVencimiento']?></div>
        <div><span>CORREO :</span> <a href="mailto:<?php echo $cliente['correo']?>"><?php echo $cliente['correo']?></a></div>

    </div>
</header>
<main>
    <table>
        <thead>
        <tr>
            <th class="service">SERVICIO</th>
            <th class="desc">SISTEMA DE SEGURIDAD</th>
            <th>PRECIO</th>
            <th>CLASIFICACIÓN</th>
            <th>TOTAL</th>


        </tr>
        </thead>

        <?php
        $sum=0;
        ?>
        <?php foreach ($modelSistemas as $modelo){

        $nombreSistema=\app\models\Tiposistemaseguridad::find()->where(['id'=>$modelo['tipoSistemaSeguridad_id']])->one();
        $clasificar= \app\models\Clasificarentidad::find()->where(['id'=>$modelo['clasificarentidad_id']])->one();

        ?>
        <tbody>
        <tr>
            <td class="service">CONTRATACIÓN DE SISTEMAS DE SEGURIDAD</td>
            <td class="desc"><?php echo $nombreSistema['nombre']?></td>
            <td class="unit"><?php echo $clasificar['precioMN']?></td>
            <td class="qty"><?php echo $modelo['clasificacion']?></td>
            <td class="total"></td>
        </tr>

        <?php
        $sum+= floatval($clasificar['precioMN']);
        ?>
        <?php  }?>
        <tr>
            <td colspan="4" class="grand total">GRAN TOTAL</td>
            <td class="grand total"><?php echo $sum?></td>
        </tr>



        </tbody>
    </table>

</main>
<footer style="margin-right: 120px">

    Este documento fue creado en una computadora y carece de validez sin la firma autorizada y el cuño de la entidad. Gracias
</footer>
</body>
</html>





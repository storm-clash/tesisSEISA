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



$cliente=Cliente::find()->where(['idcliente'=>$id])->one();
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
    <h1>FICHA No.<?php echo $cliente['idcliente']?> </h1>
    <div id="company" class="clearfix">
        <div>Empresa de Servicios de Seguridad Integral, S.A. (SEISA)</div>
        <div>Ave.47 No.3413 E/34 y 36,<br /> Reparto Koly, Playa, Cuba</div>
        <div>(537) 227-7128</div>
        <div><a href="mailto:negocios@seisa.cu">negocios@seisa.cu</a></div>
    </div>
    <div id="project">
        <div><span>PROYECTO :</span> Ficha de Cliente</div>
        <div><span>CLIENTE :</span> <?php echo $cliente['nombreCliente']?></div>
        <div><span>DIRECCION :</span><?php echo $cliente['direccion']?></div>
        <div><span>CORREO :</span> <a href="mailto:<?php echo $cliente['correo']?>"><?php echo $cliente['correo']?></a></div>

    </div>
</header>
<main>
    <table>
        <thead>
        <tr>
            <th class="service">NOMBRE</th>
            <th class="desc">CODIGO REEUP</th>
            <th>TELEFONO</th>
            <th>CORREO</th>
            <th>DIRECCION</th>
            <th>Agencia Bancaria</th>


        </tr>
        </thead>

        <tbody>
        <tr>
            <td class="service"><?php echo $cliente['nombreCliente']?></td>
            <td class="desc"><?php echo $cliente['codigoREEUP']?></td>
            <td class="desc"><?php echo $cliente['telefono']?></td>
            <td class="desc"><?php echo $cliente['correo']?></td>
            <td class="unit"><?php echo $cliente['direccion']?></td>
            <td class="qty"><?php echo $cliente['agenciaBanCup']?></td>

        </tr>



        </tbody>
    </table>

</main>
<footer style="margin-right: 120px">

    Este documento fue creado en una computadora y carece de validez sin la firma autorizada y el cuño de la entidad. Gracias
</footer>
</body>
</html>





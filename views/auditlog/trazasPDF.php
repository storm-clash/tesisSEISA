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



$cliente=\app\models\Auditlog::find()->where(['id'=>$id])->one();
$usuario=\app\models\User::findOne($cliente['by']);

$trazas=\app\models\Auditlog::find()->where(['by'=>$usuario['id']])->all();
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
    <h1>Trazas del Usuario <?php echo $usuario['username']?> </h1>
    <div id="company" class="clearfix">
        <div>Empresa de Servicios de Seguridad Integral, S.A. (SEISA)</div>
        <div>Ave.47 No.3413 E/34 y 36,<br /> Reparto Koly, Playa, Cuba</div>
        <div>(537) 227-7128</div>
        <div><a href="mailto:negocios@seisa.cu">negocios@seisa.cu</a></div>
    </div>
    <div id="project">
        <div><span>PROYECTO :</span> Registro de Seguridad</div>
        <div><span>CLIENTE :</span> <?php echo $usuario['username']?></div>

        <div><span>CORREO :</span> <a href="mailto:<?php echo $usuario['email']?>"><?php echo $usuario['email']?></a></div>

    </div>
</header>
<main>
    <table>
        <thead>
        <tr>
                <th class="service">MODELO</th>
            <th class="desc">ACCIÓN REALIZADA</th>
            <th>FECHA</th>
            <th>ANTERIOR</th>
            <th>AHORA</th>



        </tr>
        </thead>
        ?>
        <?php foreach ($trazas as $modelo){



        ?>
        <tbody>
        <tr>
            <td class="service"><?php echo $modelo['model']?></td>
            <td class="desc"><?php echo $modelo['action']?></td>
            <td class="unit"><?php echo $modelo['at']?></td>
            <td class="qty"><?php echo $modelo['old']?></td>
            <td class="qty"><?php echo $modelo['new']?></td>
        </tr>


        <?php  }?>

        </tbody>
    </table>

</main>
<footer style="margin-right: 120px">

    Este documento fue creado en una computadora y carece de validez sin la firma autorizada y el cuño de la entidad. Gracias
</footer>
</body>
</html>





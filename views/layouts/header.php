<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<style type="text/css">.material-icons, .mdi{font-size: 16px}</style>
<!-- Navbar -->
<style type="text/css">.navbar .collapse .navbar-nav .nav-item .nav-link{font-size: 12px}</style>


<nav class="navbar navbar-expand navbar navbar-dark bg-dark" >


    <a class="navbar-brand" href="#">
        <?=\yii\helpers\Html::img('/img/favicon6.png',['width'=>'50%'])?>
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">

            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Reportes de la Empresa
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/site/report">Valores de Contratos</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/site/brigada"> Reportes de Brigadas</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/site/grafica">Gráficos de Brigadas</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/site/ganancia">Sistemas Contratados</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/site/plan">Volumen de Planificación Anual</a>

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Registro
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/ueb/index">Registro UEBs</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/organismo">Registro Organismos</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/brigada/index">Registro Brigadas</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/formaspago/index"> Registro de Formas de Pago</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/cargos/index">Registro de Cargos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/estado/index">Registro Estados de los Equipos</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/provincia/index">Registro de Provincias</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/categoria/index">Registro de Categoria de las Brigadas</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/tipoparametro/index">Registro Nomenclador de Parámetros</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/tiposistemaseguridad/index">Registro de Tipos de Sistemas de Seguridad</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/registromantenimientos/index">Registro de Mantenimientos a Sistemas </a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Órdenes en el Sistema
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/ordenservicio/index">Órdenes de Servicio</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/ordencompra/index">Órdenes de Compra</a>

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Parámetros para Sistemas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <h5 style="text-align: center">Sistemas Electrónicos</h5>


                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/cantsistemas/index">Número de Sistemas de Seguridad</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/cantdispositivos/index">Número de Dispositivos por Sistema</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/compequiposelec/index">Complejidad para Sistemas Electrónicos </a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/altura/index">Altura de la instalación</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/condambsegelect/index">Condiciones ambientales</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/obstruccionequipo/index">Obstrucción de los Equipos</a>
                    <div class="dropdown-divider"></div>
                    <h5 class="" style="text-align: center">Sistemas Pararrayos</h5>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/nivelessepresores/index">Nivel de Supresor</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/mastilpararayo/index">Mástil del Pararrayos</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/perimetralmalla/index">Malla Perimetral</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/pararrayos/index">Pararrayos</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/cantmediciones/index">Cantidad de Mediciones</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/tamanobajante/index">Tamaño del Bajante</a>
                    <div class="dropdown-divider"></div>
                    <h5 style="text-align: center">Sistemas Extinsión Fija</h5>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/alturamontaje/index">Altura del Montaje</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/cantidadaccesorios/index">Número de Accesorios</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/complejidadsistfijos/index">Complejidad para Sistemas Fijos</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/cantidadsistemasfijos/index">Número de Sistemas Fijos</a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/condambsistfijos/index">Condiciones ambientales para Sistemas Fijos</a>


                </div>
            </li>
        </ul>
        <ul>
        <li class="nav-item dropdown" style="margin-right: 110px">
            <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">person</i>
                <p class="d-lg-none d-md-block">
                    Account
                </p>
            </a>

            <div class="dropdown-menu dropdown-menu-md-left" aria-labelledby="navbarDropdownProfile" >


                <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/site/info">Perfil</a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" style="padding: 0;">

                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/emails/index">
                        <i class="material-icons">mail</i>
                        <p class="d-lg-none d-md-block">
                            Correo
                        </p>
                    </a>
                    <a class="dropdown-item" href="http://mantenimiento.seisa/index.php/user/security/login">Autenticar</a>




                    <p class="d-lg-none d-md-block">

                            <?php
                            if(Yii::$app->user->isGuest){

                            }else{
                                echo Html::beginForm(['/site/logout'], 'post');
                                echo Html::submitButton(
                                    'Logout ('.Yii::$app->user->identity->username . ')',
                                    ['class' => 'btn btn-dark logout ']
                                );
                                echo Html::endForm();
                            }


                            ?>
                    </p>


                </a>
            </div>
        </li>
        </ul>


    </div>
</nav>
<!-- End Navbar -->

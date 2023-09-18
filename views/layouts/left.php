<?php
    $menu = $img = "";
    $config = new rce\material\Config();
    if (class_exists('common\models\Menu')) {
        // advence template
        $menu = common\models\Menu::getMenu();
        // echo $menu;die;
    }
    if (class_exists('app\models\Menu')) {
        // basic template
        $menu = app\models\Menu::getMenu();
    }
    if(empty($config::sidebarBackgroundImage())) {
        $img = $directoryAsset.'/img/sidebar-1.jpg';
    }else {
        $img = $config::sidebarBackgroundImage();
    }
?>
<style type="text/css">.sidebar .nav p{font-size: 12px}</style>
<style type="text/css">.sidebar .nav i{font-size: 20px}</style>

<body class="perfect-scrollbar-on sidebar-mini" style=" font-size: 10px">
<div class="sidebar" data-color="<?= $config::sidebarColor()  ?>" data-background-color="<?= $config::sidebarBackgroundColor()  ?>">
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            <?php
            if(empty($config::logoMini())) { ?>
                <img src="<?=$directoryAsset;?>/web/img/favicon6.png" style="max-width: 30px;" alt="">
            <?php } else {
                echo $config::logoMini();
            }
            ?>
        </a>
        <a href="#" class="simple-text logo-normal">
            <?= $config::siteTitle()  ?>
        </a>
    </div>
    <div class="sidebar-wrapper" >
        <div class="sidebar" data-color="orange" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">
            <!--
              Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

              Tip 2: you can also add an image using data-image tag
          -->
            <div class="logo">
                <a href="/" class="simple-text logo-normal">
                    <?=\yii\helpers\Html::img('/img/tema/favicon.png',['width'=>'60%'])?>
                </a>
            </div>
            <div class="sidebar-wrapper" >
                <ul class="nav" >
                    <li class="nav-item active  " >
                        <a class="nav-link" href="http://mantenimiento.seisa/">
                            <i class="material-icons" style="">dashboard</i>
                            <p>Página Principal</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="http://mantenimiento.seisa/index.php/user/admin/">
                            <i class="material-icons">person</i>
                            <p>Registrar Usuario</p>
                        </a>

                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="http://mantenimiento.seisa/index.php/cliente/index">
                            <i class="material-icons">content_paste</i>
                            <p>Registrar Cliente</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="http://mantenimiento.seisa/index.php/sistemasintalados/index">
                            <i class="material-icons">library_books</i>
                            <p>Registrar Sistemas</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="http://mantenimiento.seisa/index.php/ofertacomercial/index">
                            <i class="material-icons">library_books</i>
                            <p>Ofertas Comerciales</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="http://mantenimiento.seisa/index.php/contrato/index">
                            <i class="material-icons">library_books</i>
                            <p>Contratos</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="http://mantenimiento.seisa/index.php/auditlog/">

                            <i class="material-icons">tv</i>
                            <p>Trazas</p>
                        </a>
                    </li>

                </ul>


            </div>
        </div>
        <?= $menu ?>
    </div>
    <div class="sidebar-background" style="background-image: url(<?= $img ?>) "></div>
</div>
</body>
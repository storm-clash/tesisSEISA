<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],

                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['/user/security/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Formularios',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Registrar Usuario', 'icon' => 'file-code-o', 'url' => ['/user/admin'],],
                            ['label' => 'Registrar Contrato', 'icon' => 'file-code-o', 'url' => ['/cliente/index'],],


                            [
                                'label' => 'Sistemas de Seguridad',
                                'icon' => 'file-code-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Sistemas Tecnológicos', 'icon' => 'circle-o', 'url' => ['/sistemaseguridadelectronica/index'],],
                                    ['label' => 'Sistemas Fijos', 'icon' => 'circle-o', 'url' => ['sistemasfijosextincion/index'],],
                                    ['label' => 'Sistemas Intalados', 'icon' => 'circle-o', 'url' => ['sistemasintalados/index'],],
                                    ['label' => 'Sistemas Protección Rayo', 'icon' => 'circle-o', 'url' => ['sistemasproteccionrayos/index'],],

                                ],
                            ],
                            [
                                'label' => 'Nomancladores Tecnológicos',
                                'icon' => 'file-code-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Altura', 'icon' => 'circle-o', 'url' => ['/altura/index'],],
                                    ['label' => 'Complejidad Tecnológica', 'icon' => 'circle-o', 'url' => ['compequiposelec/index'],],
                                    ['label' => 'Condiciones Ambientale', 'icon' => 'circle-o', 'url' => ['condambsegelect/index'],],
                                    ['label' => 'Cantidad de Dispositivos', 'icon' => 'circle-o', 'url' => ['cantdispositivos/index'],],
                                    ['label' => 'Cantidad de Sistemas', 'icon' => 'circle-o', 'url' => ['cantsistemas/index'],],
                                ],
                            ],
                            [
                                'label' => 'Nomancladores Extintores',
                                'icon' => 'file-code-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Altura del Montaje', 'icon' => 'circle-o', 'url' => ['/alturamontaje/index'],],
                                    ['label' => 'Accesorios', 'icon' => 'circle-o', 'url' => ['/cantidadaccesorios/index'],],
                                    ['label' => 'Cant. Sistemas Fijos', 'icon' => 'circle-o', 'url' => ['cantidadsistemasfijos/index'],],
                                    ['label' => 'Complejidad del Equipo', 'icon' => 'circle-o', 'url' => ['complejidadsistfijos/index'],],
                                    ['label' => 'Condiciones Ambientales', 'icon' => 'circle-o', 'url' => ['condambsistfijos/index'],],


                                ],
                            ],
                            [
                                'label' => 'Nomancladores Para Rayos',
                                'icon' => 'file-code-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Cantidad Mediciones', 'icon' => 'circle-o', 'url' => ['/cantmediciones/index'],],
                                    ['label' => 'Mástil del Pararrayo', 'icon' => 'circle-o', 'url' => ['mastilpararayo/index'],],
                                    ['label' => 'Nivel de Supresores', 'icon' => 'circle-o', 'url' => ['nivelessepresores/index'],],
                                    ['label' => 'Tamaño del Bajante', 'icon' => 'circle-o', 'url' => ['tamanobajante/index'],],

                                    ['label' => 'Cantidad Pararrayos', 'icon' => 'circle-o', 'url' => ['pararrayos/index'],],
                                    ['label' => 'Malla Peimetral', 'icon' => 'circle-o', 'url' => ['perimetralmalla/index'],],

                                ],
                            ],
                            [
                                'label' => 'Nomancladores Comunes',
                                'icon' => 'file-code-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Nivel Obstrucciones', 'icon' => 'circle-o', 'url' => ['obstruccionequipo/index'],],
                                    ['label' => 'Tipos de Sistemas', 'icon' => 'circle-o', 'url' => ['tiposistemaseguridad/index'],],
                                    ['label' => 'Provincias', 'icon' => 'circle-o', 'url' => ['provincia/index'],],

                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>

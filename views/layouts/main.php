<?php
use yii\helpers\Html;
use rce\material\widgets\Noti;
use rce\material\Assets;
use yii\bootstrap4\Breadcrumbs;


if (Yii::$app->controller->action->id === 'login') {
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

if (class_exists('backend\assets\AppAsset')) {
    backend\assets\AppAsset::register($this);
} else {
    app\assets\AppAsset::register($this);
}
$bundle = Assets::register($this);
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/ricar2ce/yii2-material-theme/assets');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <style type="text/css">body{width: 100%}</style>




    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <!-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"> -->
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
	<body class="sidebar-mini" style="font-size: 14px" >

		<?php $this->beginBody() ?>
		  <div class="wrapper ">
		    <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset ]
        ) ?>
		    <div class="main-panel" >
		    	<?= $this->render('header.php') ?>
                <div class="scroll-container" style="margin-top: 35px;margin-bottom: 40px;;display: block;width: 100%;height: 80%;overflow-y: scroll;scroll-behavior: smooth">

			    	<div class=" container col-md-12 col-lg-10 col-sm-12" style="width: 100%"> <!--style="width: 1140px" -->
                        <div class="col-sm-6 col-xl">
                  <?= Noti::widget() ?>
                  <?php
                 if(Yii::$app->session->hasFlash('success')){?>
                     <div class="alert alert-success alert-dismissable mb-2" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">x</span>
                      </button>
                      <strong><?=Yii::$app->session->getFlash('success')?></strong>
                  </div>

                <?php }
                  ?>

                            <?php
                            if(Yii::$app->session->hasFlash('error')){?>
                                 <div class="alert alert-danger alert-dismissable mb-2" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </button>
                                <strong><?=Yii::$app->session->getFlash('error')?></strong>
                            </div>

                          <?php  }
                            ?>

                            <?php
                            if(Yii::$app->session->hasFlash('info')){?>
                               <div class="alert alert-info alert-dismissable mb-2" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </button>
                                <strong><?=Yii::$app->session->getFlash('info')?></strong>
                            </div>
                           <?php }
                            ?>

                            <?php
                            if(Yii::$app->session->hasFlash('warning')){?>
                                <div class="alert alert-warning alert-dismissable mb-2" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </button>
                                <strong><?=Yii::$app->session->getFlash('warning')?></strong>
                            </div>

                          <?php  }
                            ?>


            			<?= $content ?>

                        </div>

			    	</div>
			    </div>
		    </div>

		  </div>


		<?php $this->endBody() ?>

	</body>

</html>
<?php $this->endPage() ?>

<?php } ?>

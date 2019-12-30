<?php
  require_once "app/ClassifiedController.php";

  if (!isset($_SESSION)) {
    session_start();
  }

  if (!isset($_GET["auto_id"]) || !is_numeric($_GET["auto_id"]) || empty($_GET["auto_id"])) {
    header("location: 404.php");
    exit();
  }

  $ClassifiedController = new ClassifiedController();
  $ClassifiedModel = $ClassifiedController->GetClassifiedByID($_GET["auto_id"]);

  if (is_null($ClassifiedModel)) {
    header("location: 404.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <title>Anúncio</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: EstateAgency
    Theme URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <?php include_once "include/search_box.php"; ?>
  <!--/ Form Search End /-->

  <!--/ Nav Star /-->
  <?php include_once "include/nav_bar.php"; ?>
  <!--/ Nav End /-->

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <?php if ($ClassifiedModel->getClassifiedType() === "Carro" || $ClassifiedModel->getClassifiedType() === "Clássico") { ?>
            <h1 class="title-single"><?php echo $ClassifiedModel->getClassifiedCarYear() . " " . $ClassifiedModel->getClassifiedCarBrand() . " " . $ClassifiedModel->getClassifiedCarModel() . " " . $ClassifiedModel->getClassifiedCarVersion(); ?></h1>
            <?php } else if ($ClassifiedModel->getClassifiedType() === "Moto") { ?>
            <h1 class="title-single"><?php echo $ClassifiedModel->getClassifiedMotorcycleYear() . " " . $ClassifiedModel->getClassifiedMotorcycleBrand() . " " . $ClassifiedModel->getClassifiedMotorcycleModel() . " " . $ClassifiedModel->getClassifiedMotorcycleVersion(); ?></h1>
            <?php } ?>
            <span class="color-text-a"><?php echo $ClassifiedModel->getClassifiedCity() . " - " . $ClassifiedModel->getClassifiedUF(); ?></span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.html">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="property-grid.html">Pesquisa</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Onix
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Single Star /-->
  <section class="property-single nav-arrow-b mb-2">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property w-75" style="left: 50%; transform: translateX(-50%);">
            <?php if (count($ClassifiedModel->getClassifiedPictures()) == 0) { ?>
            <div class="carousel-item-b">
              <img src="img/iconfinder_instagram_252092.png" alt="">
            </div>
            <?php } ?>
            <?php for ($i = 0; $i < count($ClassifiedModel->getClassifiedPictures()); $i++) { ?>
            <div class="carousel-item-b">
              <img src="assets/classifieds/<?php echo $ClassifiedModel->getClassifiedPictures()[$i]; ?>" alt="">
            </div>
            <?php } ?>
          </div>
          <div class="row justify-content-between">
            <div class="col-md-5 col-lg-4">
              <div class="property-price d-flex justify-content-center foo">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="ion-money">R$</span>
                  </div>
                  <div class="card-title-c align-self-center">
                    <h5 class="title-c"><?php echo $ClassifiedModel->getClassifiedPrice(); ?></h5>
                  </div>
                </div>
              </div>
              <div class="property-summary">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d section-t4">
                      <h3 class="title-d">Informações</h3>
                    </div>
                  </div>
                </div>
                <div class="summary-list">
                  <ul class="list">
                    <li class="d-flex justify-content-between">
                      <strong>Marca:</strong>
                      <?php if ($ClassifiedModel->getClassifiedType() === "Carro" || $ClassifiedModel->getClassifiedType() === "Clássico") { ?>
                      <span><?php echo $ClassifiedModel->getClassifiedCarBrand(); ?></span>
                      <?php } else if ($ClassifiedModel->getClassifiedType() === "Moto") { ?>
                      <span><?php echo $ClassifiedModel->getClassifiedMotorcycleBrand(); ?></span>
                      <?php } ?>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Modelo:</strong>
                      <?php if ($ClassifiedModel->getClassifiedType() === "Carro" || $ClassifiedModel->getClassifiedType() === "Clássico") { ?>
                      <span><?php echo $ClassifiedModel->getClassifiedCarModel(); ?></span>
                      <?php } else if ($ClassifiedModel->getClassifiedType() === "Moto") { ?>
                      <span><?php echo $ClassifiedModel->getClassifiedMotorcycleModel(); ?></span>
                      <?php } ?>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Versão:</strong>
                      <?php if ($ClassifiedModel->getClassifiedType() === "Carro" || $ClassifiedModel->getClassifiedType() === "Clássico") { ?>
                      <span><?php echo $ClassifiedModel->getClassifiedCarVersion(); ?></span>
                      <?php } else if ($ClassifiedModel->getClassifiedType() === "Moto") { ?>
                      <span><?php echo $ClassifiedModel->getClassifiedMotorcycleVersion(); ?></span>
                      <?php } ?>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Combustível:</strong>
                      <?php if ($ClassifiedModel->getClassifiedType() === "Carro" || $ClassifiedModel->getClassifiedType() === "Clássico") { ?>
                      <span><?php echo $ClassifiedModel->getClassifiedCarFuel(); ?></span>
                      <?php } else if ($ClassifiedModel->getClassifiedType() === "Moto") { ?>
                      <span><?php echo $ClassifiedModel->getClassifiedMotorcycleFuel(); ?></span>
                      <?php } ?>
                    </li>
                    <li class="d-flex justify-content-between">
                      <?php if ($ClassifiedModel->getClassifiedType() === "Carro" || $ClassifiedModel->getClassifiedType() === "Clássico") { ?>
                      <strong>Câmbio:</strong>
                      <span><?php echo $ClassifiedModel->getClassifiedCarTransmission(); ?></span>
                      <?php } ?>
                    </li>
                    <li class="d-flex justify-content-between">
                      <?php if ($ClassifiedModel->getClassifiedType() === "Carro" || $ClassifiedModel->getClassifiedType() === "Clássico") { ?>
                      <strong>Portas:</strong>
                      <span><?php echo $ClassifiedModel->getClassifiedCarDoors(); ?></span>
                      <?php } ?>
                    </li>
                    <li class="d-flex justify-content-between">
                    <?php if ($ClassifiedModel->getClassifiedType() === "Carro" || $ClassifiedModel->getClassifiedType() === "Clássico") { ?>
                      <strong>Motor:</strong>
                      <span><?php echo $ClassifiedModel->getClassifiedCarEngine(); ?></span>
                      <?php } ?>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Quilometragem:</strong>
                      <?php if ($ClassifiedModel->getClassifiedType() === "Carro" || $ClassifiedModel->getClassifiedType() === "Clássico") { ?>
                      <span><?php echo $ClassifiedModel->getClassifiedCarMetreage() . "km"; ?></span>
                      <?php } else if ($ClassifiedModel->getClassifiedType() === "Moto") { ?>
                      <span><?php echo $ClassifiedModel->getClassifiedMotorcycleMetreage() . "km"; ?></span>
                      <?php } ?>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-lg-7 section-md-t3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Descrição do Veículo</h3>
                  </div>
                </div>
              </div>
              <div class="property-description">
                <p class="description color-text-a">
                  <?php echo $ClassifiedModel->getClassifiedDescription(); ?>
                </p>
              </div>
              <div class="row section-t3">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Conforto</h3>
                  </div>
                </div>
              </div>
              <div class="amenities-list color-text-a">
                <ul class="list-a no-margin">
                  <?php if ($ClassifiedModel->getClassifiedType() === "Carro" || $ClassifiedModel->getClassifiedType() === "Clássico") { ?>
                  <?php if ($ClassifiedModel->getClassifiedCarItemsModel()->getClassifiedCarItemsHasAirConditioning()) { ?>
                  <li>Ar-condicionado</li>
                  <?php } ?>
                  <?php if ($ClassifiedModel->getClassifiedCarItemsModel()->getClassifiedCarItemsHasPowerLocks()) { ?>
                  <li>Trava elétrica</li>
                  <?php } ?>
                  <?php if ($ClassifiedModel->getClassifiedCarItemsModel()->getClassifiedCarItemsHasBoardComputer()) { ?>
                  <li>Computador de bordo</li>
                  <?php } ?>
                  <?php if ($ClassifiedModel->getClassifiedCarItemsModel()->getClassifiedCarItemsHasGPS()) { ?>
                  <li>GPS</li>
                  <?php } ?>
                  <?php if ($ClassifiedModel->getClassifiedCarItemsModel()->getClassifiedCarItemsHasLeatherSeats()) { ?>
                  <li>Bancos em couro</li>
                  <?php } ?>
                  <?php if ($ClassifiedModel->getClassifiedCarItemsModel()->getClassifiedCarItemsHasPowerMirrors()) { ?>
                  <li>Retrovisores elétricos</li>
                  <?php } ?>
                  <?php if ($ClassifiedModel->getClassifiedCarItemsModel()->getClassifiedCarItemsHasReverseSensor()) { ?>
                  <li>Sensor de ré</li>
                  <?php } ?>
                  <?php if ($ClassifiedModel->getClassifiedCarItemsModel()->getClassifiedCarItemsHasPowerSteering()) { ?>
                  <li>Direção Hidráulica</li>
                  <?php } ?>
                  <?php if ($ClassifiedModel->getClassifiedCarItemsModel()->getClassifiedCarItemsHasRearHeadrest()) { ?>
                  <li>Encosto de Cabeça Traseiro</li>
                  <?php } ?>
                  <?php } else if ($ClassifiedModel->getClassifiedType() === "Moto") { ?>
                  <?php if ($ClassifiedModel->getClassifiedMotorcycleItemsModel()->getClassifiedMotorcycleItemsHasFrontBrakeDisk()) { ?>
                  <li>Disco de freio dianteiro</li>
                  <?php } ?>
                  <?php if ($ClassifiedModel->getClassifiedMotorcycleItemsModel()->getClassifiedMotorcycleItemsHasBackBrakeDisk()) { ?>
                  <li>Disco de freio traseiro</li>
                  <?php } ?>
                  <?php if ($ClassifiedModel->getClassifiedMotorcycleItemsModel()->getClassifiedMotorcycleItemsHasABS()) { ?>
                  <li>ABS</li>
                  <?php } ?>
                  <?php if ($ClassifiedModel->getClassifiedMotorcycleItemsModel()->getClassifiedMotorcycleItemsHasPowerStart()) { ?>
                  <li>Partida Elétrica</li>
                  <?php } ?>
                  <?php if ($ClassifiedModel->getClassifiedMotorcycleItemsModel()->getClassifiedMotorcycleItemsHasAlloyWheels()) { ?>
                  <li>Rodas de Liga Leve</li>
                  <?php } ?>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-10 offset-md-1">
          <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-video-tab" data-toggle="pill" href="#pills-video" role="tab"
                aria-controls="pills-video" aria-selected="true">Video</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
              <?php if (!empty($ClassifiedModel->getClassifiedVideoLink())) { ?>
              <iframe width="100%" height="460" src="<?php echo $ClassifiedController->GetYoutubeEmbedUrl($ClassifiedModel->getClassifiedVideoLink()); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              <?php } else { ?>
                <iframe width="100%" height="460" src="<?php echo $ClassifiedController->GetYoutubeEmbedUrl("https://www.youtube.com/watch?v=LpVpqSx1rT0"); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              <?php } ?>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Property Single End /-->

  <!--/ footer Star /-->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              <span class="color-a">José Venâncio - Lucas Vidigal - Mariana Lellis - Yan Victor Brandão</span>
            </p>
          </div>
          <div class="credits">
            
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ Footer End /-->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/scrollreveal/scrollreveal.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>

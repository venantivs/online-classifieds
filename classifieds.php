<?php
  require_once "app/ClassifiedController.php";

  if (!isset($_SESSION)) {
    session_start();
  }

  if (!isset($_GET["Type"]) || ($_GET["Type"] !== "Car" && $_GET["Type"] !== "Motorcycle" && $_GET["Type"] !== "Classic")) {
    header("location: classifieds.php?Type=Car");
    exit();
  }

  $ClassifiedController = new ClassifiedController();

  if ($_GET["Type"] === "Car") {
    $ClassifiedCarsArray = $ClassifiedController->GetClassifiedCars();
  } else if ($_GET["Type"] === "Motorcycle") {
    $ClassifiedMotorcyclesArray = $ClassifiedController->GetClassifiedMotorcycles();
  } else if ($_GET["Type"] === "Classic") {
    $ClassifiedCarsArray = $ClassifiedController->GetClassifiedClassics();
  }
  
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <title>EstateAgency Bootstrap Template</title>
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
            <h1 class="title-single">Nossos resultados para você</h1>
            <!--<span class="color-text-a">Chevrolet Onix LTZ</span>-->
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Pesquisa
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Grid Star /-->
  <section class="property-grid grid">
    <div class="container">
      <div class="row">
        <?php if ($_GET["Type"] === "Car" || $_GET["Type"] === "Classic") { ?>
        <?php if (count($ClassifiedCarsArray) == 0) { ?>
        <div class="col-md-12 mb-4">
        <h1>Não há resultados</h1>
        <h3>Porém, talvez você queira checar outras áreas</h3>
        <?php if ($_GET["Type"] === "Car") { ?>
        <button type="button" class="btn btn-b w-25" onclick="location.href='classifieds.php?Type=Classic'">Ir para Clássicos</button>
        <?php } else if ($_GET["Type"] === "Classic") { ?>
          <button type="button" class="btn btn-b w-25" onclick="location.href='classifieds.php?Type=Car'">Ir para Carros</button>
        <?php } ?>
        <button type="button" class="btn btn-b w-25" onclick="location.href='classifieds.php?Type=Motorcycle'">Ir para Motos</button>
        <button type="button" class="btn btn-b w-25" onclick="location.href='index.php'">Voltar para o Início</button>
        </div>
        <?php } ?>
        <?php for ($i = 0; $i < count($ClassifiedCarsArray); $i++) { ?>
        <div class="col-md-4">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <?php if (count($ClassifiedCarsArray[$i]->getClassifiedPictures()) > 0) { ?>
              <img src="assets/classifieds/<?php echo $ClassifiedCarsArray[$i]->getClassifiedPictures()[0]; ?>" alt="" class="img-a h-100 center-image">
              <?php } else { ?>
              <img src="img/iconfinder_instagram_252092.png" alt="" class="img-a h-100 center-image">
              <?php } ?>
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="#"><?php echo $ClassifiedCarsArray[$i]->getClassifiedCarYear() . " " . $ClassifiedCarsArray[$i]->getClassifiedCarBrand(); ?>
                      <br />&nbsp;<?php echo $ClassifiedCarsArray[$i]->getClassifiedCarModel() . " " . $ClassifiedCarsArray[$i]->getClassifiedCarVersion(); ?></a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">Comprar | R$ <?php echo $ClassifiedCarsArray[$i]->getClassifiedPrice(); ?></span>
                  </div>
                  <a href="classified.php?auto_id=<?php echo $ClassifiedCarsArray[$i]->getClassifiedID(); ?>" class="link-a">Clique aqui para ver
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Cor</h4>
                      <span><?php echo $ClassifiedCarsArray[$i]->getClassifiedCarColor(); ?></span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Comb.</h4>
                      <span><?php echo $ClassifiedCarsArray[$i]->getClassifiedCarFuel(); ?></span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Portas</h4>
                      <span><?php echo $ClassifiedCarsArray[$i]->getClassifiedCarDoors(); ?></span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Câmbio</h4>
                      <span><?php echo $ClassifiedCarsArray[$i]->getClassifiedCarTransmission(); ?></span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
        <?php } else if ($_GET["Type"] === "Motorcycle") { ?>
        <?php if (count($ClassifiedMotorcyclesArray) == 0) { ?>
        <div class="col-md-12 mb-4">
          <h1>Não há resultados</h1>
          <h3>Porém, talvez você queira checar outras áreas</h3>
          <button type="button" class="btn btn-b w-25" onclick="location.href='classifieds.php?Type=Car'">Ir para Carros</button>
          <button type="button" class="btn btn-b w-25" onclick="location.href='classifieds.php?Type=Classic'">Ir para Clássicos</button>
          <button type="button" class="btn btn-b w-25" onclick="location.href='index.php'">Voltar para o Início</button>
        </div>
        <?php } ?>
        <?php for ($i = 0; $i < count($ClassifiedMotorcyclesArray); $i++) { ?>
        <div class="col-md-4">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <?php if (count($ClassifiedMotorcyclesArray[$i]->getClassifiedPictures()) > 0) { ?>
              <img src="assets/classifieds/<?php echo $ClassifiedMotorcyclesArray[$i]->getClassifiedPictures()[0]; ?>" alt="" class="img-a h-100 center-image">
              <?php } else { ?>
              <img src="img/iconfinder_instagram_252092.png" alt="" class="img-a h-100 center-image">
              <?php } ?>
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="#"><?php echo $ClassifiedMotorcyclesArray[$i]->getClassifiedMotorcycleYear() . " " . $ClassifiedMotorcyclesArray[$i]->getClassifiedMotorcycleBrand(); ?>
                      <br />&nbsp;<?php echo $ClassifiedMotorcyclesArray[$i]->getClassifiedMotorcycleModel() . " " . $ClassifiedMotorcyclesArray[$i]->getClassifiedMotorcycleVersion(); ?></a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">Comprar | R$ <?php echo $ClassifiedMotorcyclesArray[$i]->getClassifiedPrice(); ?></span>
                  </div>
                  <a href="classified.php?auto_id=<?php echo $ClassifiedMotorcyclesArray[$i]->getClassifiedID(); ?>" class="link-a">Clique aqui para ver
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Cor</h4>
                      <span><?php echo $ClassifiedMotorcyclesArray[$i]->getClassifiedMotorcycleColor(); ?></span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Comb.</h4>
                      <span><?php echo $ClassifiedMotorcyclesArray[$i]->getClassifiedMotorcycleFuel(); ?></span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Ano</h4>
                      <span><?php echo $ClassifiedMotorcyclesArray[$i]->getClassifiedMotorcycleYear(); ?></span>
                    </li>
                    <li>
                      <h4 class="card-info-title">KMs</h4>
                      <span><?php echo $ClassifiedMotorcyclesArray[$i]->getClassifiedMotorcycleMetreage(); ?></span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
        <?php } ?>
      </div>
      
    </div>
  </section>
  <!--/ Property Grid End /-->

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

<?php
  require_once "app/Constants.php";

  if (!isset($_SESSION)) {
    session_start();
  }

  if (!isset($_SESSION["UserID"]) || !is_numeric($_SESSION["UserID"]) || empty($_SESSION["UserID"])) {
    header("location: login.php");
    exit();
  }

  if (!isset($_GET["Type"]) || ($_GET["Type"] !== "Car" && $_GET["Type"] !== "Motorcycle" && $_GET["Type"] !== "Classic")) {
    header("location: announce.php?Type=Car");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <title>Anunciar</title>
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
  <link href="lib/notify/css/jquery.notify" rel="stylesheet">

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
            <h1 class="title-single">Anuncie seu auto</h1>
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
                Anunciar
                </li>
            </ol>
            </nav>
        </div>
        </div>
    </div>
    </section>
    <!--/ Intro Single End /-->

    <div class="container">
        <form id="CreateAnnounceForm" class="form-a" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="action" value="announce">
            <div class="row">
                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="Type">Tipo</label>
                    <select name="cmbType" class="form-control form-control-lg form-control-a" id="Type">
                      <option onclick="location.href = 'announce.php?Type=Car';" <?php if ($_GET["Type"] === "Car") { echo "selected"; } ?>>Carro</option>
                      <option onclick="location.href = 'announce.php?Type=Motorcycle';" <?php if ($_GET["Type"] === "Motorcycle") { echo "selected"; } ?>>Moto</option>
                      <option onclick="location.href = 'announce.php?Type=Classic';" <?php if ($_GET["Type"] === "Classic") { echo "selected"; } ?>>Clássico</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="make">Marca</label>
                    <select name="cmbBrand" class="form-control form-control-lg form-control-a" id="make">
                      <?php if ($_GET["Type"] === "Car") { ?>
                        <?php for ($i = 0; $i < count(CarBrands); $i++) { ?>
                        <option><?php echo CarBrands[$i]; ?></option>
                        <?php } ?>
                      <?php } else if ($_GET["Type"] === "Motorcycle") { ?>
                        <?php for ($i = 0; $i < count(MotorcycleBrands); $i++) { ?>
                        <option><?php echo MotorcycleBrands[$i]; ?></option>
                        <?php } ?>
                      <?php } else if ($_GET["Type"] === "Classic") { ?>
                        <?php for ($i = 0; $i < count(ClassicBrands); $i++) { ?>
                        <option><?php echo ClassicBrands[$i]; ?></option>
                        <?php } ?>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="model">Modelo</label>
                    <input id="model" name="txtModel" type="text" class="form-control form-control-lg form-control-a" placeholder="Ex: Corsa, Opala, Gol">
                  </div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="trimlevel">Versão</label>
                    <input id="trimlevel" name="txtVersion" type="text" class="form-control form-control-lg form-control-a" placeholder="Ex: LT, LTZ, GTI, MSI...">
                  </div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="year">Ano</label>
                    <select name="cmbYear" class="form-control form-control-lg form-control-a" id="year">
                      <?php if ($_GET["Type"] === "Car") { ?>
                        <?php for($i = date("Y"); $i > 1981; $i--) { ?>
                        <option><?php echo $i; ?></option>
                        <?php } ?>
                      <?php } else if ($_GET["Type"] === "Motorcycle") { ?>
                        <?php for($i = date("Y"); $i > 1885; $i--) { ?>
                        <option><?php echo $i; ?></option>
                        <?php } ?>
                      <?php } else if ($_GET["Type"] === "Classic") { ?>
                        <?php for($i = 1981; $i > 1870; $i--) { ?>
                        <option><?php echo $i; ?></option>
                        <?php } ?>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="price">Preço</label>
                    <input id="price" name="txtPrice" type="number" class="form-control form-control-lg form-control-a" min="5000" step="500" value="5000">
                  </div>
                </div>
                <div class="col-md-12 mt-5 mb-2">
                  <!--/ Intro Single star /-->
                  <section class="title-single-nopadding mb-3">
                    <div class="container">
                      <div class="row">
                      <div class="col-md-12 col-lg-8">
                          <div class="title-single-box">
                          <h1 class="title-single">Detalhes</h1>
                          </div>
                      </div>
                      </div>
                    </div>
                  </section>
                  <!--/ Intro Single End /-->
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="FuelType">Combustível</label>
                        <select name="cmbFuel" class="form-control form-control-lg form-control-a" id="FuelType">
                          <option active>Gasolina</option>
                          <option>Etanol</option>
                          <option>Flex</option>
                          <option>GNV</option>
                        </select>
                      </div>
                    </div>
                    <?php if ($_GET["Type"] === "Car" || $_GET["Type"] === "Classic") { ?>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="Transmission">Câmbio</label>
                        <select name="cmbTransmission" class="form-control form-control-lg form-control-a" id="Transmission">
                          <option active>Manual</option>
                          <option>Automático</option>
                          <option>Automatizado</option>
                          <option>CVT</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="Doors">Portas</label>
                        <select name="cmbDoors" class="form-control form-control-lg form-control-a" id="Doors">
                          <option active>2</option>
                          <option>4</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="Engine">Motor</label>
                        <input name="txtEngine" type="text" class="form-control form-control-lg form-control-a" id="Engine" placeholder="Ex: 1.0 8v, 1.6 16v, 250 4.1 12v...">
                      </div>
                    </div>
                    <?php } ?>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="Mileage">Quilometragem</label>
                        <input name="txtMetreage" type="number" class="form-control form-control-lg form-control-a" id="Mileage" min="0" step="100" value="0">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="Color">Cor</label>
                        <input name="txtColor" type="text" class="form-control form-control-lg form-control-a" id="Color" placeholder="Ex: Vermelho, Preto, Prata...">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mt-5 mb-2">
                  <!--/ Intro Single star /-->
                  <section class="title-single-nopadding mb-3">
                    <div class="container">
                      <div class="row">
                      <div class="col-md-12 col-lg-8">
                          <div class="title-single-box">
                          <h1 class="title-single">Descrição</h1>
                          </div>
                      </div>
                      </div>
                    </div>
                  </section>
                  <!--/ Intro Single End /-->
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12 mb-3">
                      <textarea name="txtDescription" class="w-100 h-100" style="resize: none;"></textarea>
                    </div>
                  </div>
                </div>
                
                <div class="col-md-12 mt-5 mb-2">
                  <!--/ Intro Single star /-->
                  <section class="title-single-nopadding mb-3">
                    <div class="container">
                      <div class="row">
                      <div class="col-md-12 col-lg-8">
                          <div class="title-single-box">
                          <h1 class="title-single">Conforto & Segurança</h1>
                          </div>
                      </div>
                      </div>
                    </div>
                  </section>
                  <!--/ Intro Single End /-->
                </div>
                <?php if ($_GET["Type"] === "Car" || $_GET["Type"] === "Classic") { ?>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <input name="ckbAirConditioning" type="checkbox" class="mr-1">Ar-condicionado
                    </div>
                    <div class="col-md-3">
                      <input name="ckbPowerLocks" type="checkbox" class="mr-1">Travas Elétricas
                    </div>
                    <div class="col-md-3">
                      <input name="ckbBoardComputer" type="checkbox" class="mr-1">Computador de Bordo
                    </div>
                    <div class="col-md-3">
                      <input name="ckbGPS" type="checkbox" class="mr-1">GPS
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <div class="row">
                    <div class="col-md-3">
                      <input name="ckbLeatherSeats" type="checkbox" class="mr-1">Bancos em Couro
                    </div>
                    <div class="col-md-3">
                      <input name="ckbPowerMirrors" type="checkbox" class="mr-1">Retrovisores Elétricos
                    </div>
                    <div class="col-md-3">
                      <input name="ckbReverseSensor" type="checkbox" class="mr-1">Sensor de Ré
                    </div>
                    <div class="col-md-3">
                      <input name="ckbPowerSteering" type="checkbox" class="mr-1">Direção Assistida
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <div class="row">
                    <div class="col-md-3">
                      <input name="ckbRearHeadrest" type="checkbox" class="mr-1">Encosto de Cabeça Traseiro
                    </div>
                    <div class="col-md-3">
                      <input name="ckbHeatedSeats" type="checkbox" class="mr-1">Aquecimento dos Bancos
                    </div>
                    <div class="col-md-3">
                      <input name="ckbMultimediaCenter" type="checkbox" class="mr-1">Central Multimídia
                    </div>
                    <div class="col-md-3">
                      <input name="ckbAutoPilot" type="checkbox" class="mr-1">Piloto Automático
                    </div>
                  </div>
                </div>
                <?php } else if ($_GET["Type"] === "Motorcycle") { ?>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <input name="ckbFrontBrakeDisc" type="checkbox" class="mr-1">Freio a disco dianteiro
                    </div>
                    <div class="col-md-3">
                      <input name="ckbBackBrakeDisc" type="checkbox" class="mr-1">Freio a disco traseiro
                    </div>
                    <div class="col-md-3">
                      <input name="ckbABS" type="checkbox" class="mr-1">ABS
                    </div>
                    <div class="col-md-3">
                      <input name="ckbPowerStart" type="checkbox" class="mr-1">Partida Elétrica
                    </div>
                    <div class="col-md-3">
                      <input name="ckbPowerStart" type="checkbox" class="mr-1">Rodas de Liga Leve
                    </div>
                  </div>
                </div>
                <?php } ?>
                <div class="col-md-12 mt-5 mb-2">
                  <!--/ Intro Single star /-->
                  <section class="title-single-nopadding mb-3">
                    <div class="container">
                      <div class="row">
                      <div class="col-md-12 col-lg-8">
                          <div class="title-single-box">
                          <h1 class="title-single">Localidade</h1>
                          </div>
                      </div>
                      </div>
                    </div>
                  </section>
                  <!--/ Intro Single End /-->
                </div>
                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="UF">UF</label>
                    <select name="cmbUF" class="form-control form-control-lg form-control-a" id="UF">
                      <option>AC</option>
                      <option>AL</option>
                      <option>AP</option>
                      <option>AM</option>
                      <option>BA</option>
                      <option>CE</option>
                      <option>DF</option>
                      <option>ES</option>
                      <option>GO</option>
                      <option>MA</option>
                      <option>MT</option>
                      <option>MS</option>
                      <option selected>MG</option>
                      <option>PA</option>
                      <option>PB</option>
                      <option>PR</option>
                      <option>PE</option>
                      <option>PI</option>
                      <option>RJ</option>
                      <option>RN</option>
                      <option>RS</option>
                      <option>RO</option>
                      <option>RR</option>
                      <option>SC</option>
                      <option>SP</option>
                      <option>SE</option>
                      <option>TO</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="City">Cidade</label>
                    <input name="txtCity" type="text" class="form-control form-control-lg form-control-a" id="City" placeholder="Ex: São João del-Rei, Prados">
                  </div>
                </div>
                <div class="col-md-12 mt-5 mb-2">
                  <!--/ Intro Single star /-->
                  <section class="title-single-nopadding mb-3">
                    <div class="container">
                      <div class="row">
                      <div class="col-md-12 col-lg-8">
                          <div class="title-single-box">
                          <h1 class="title-single">Fotos</h1>
                          </div>
                      </div>
                      </div>
                    </div>
                  </section>
                  <!--/ Intro Single End /-->
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-8"><input type="file" id="ImagePicker" name="fileImages[]" style="position: absolute; top: 50%; transform: translateY(-50%);" multiple="multiple" accept="image/*"></div><div class="col-md-4"><input type="button" class="btn btn-b w-50 float-right" onclick="ClearImages();" value="Limpar"></div>
                  </div> 
                  <div id="ImageBox" class="col-md-12 border rounded my-3 p-3">
                  </div>
                </div>
                <div class="col-md-12 mt-5 mb-2">
                    <!--/ Intro Single star /-->
                    <section class="title-single-nopadding mb-3">
                      <div class="container">
                        <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="title-single-box">
                            <h1 class="title-single">Vídeo</h1>
                            </div>
                        </div>
                        </div>
                      </div>
                    </section>
                    <!--/ Intro Single End /-->
                  </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="Url_Video">YouTube URL</label>
                    <input name="txtVideoLink" type="url" class="form-control form-control-lg form-control-a" id="Url_Video" placeholder="Ex: https://www.youtube.com/watch?v=Gz5mI6tqm_Q">
                  </div>
                </div>
                <div class="col-md-12 my-3">
                  <button type="button" class="btn btn-b w-100" onclick="CreateAnnounce();">Anunciar <?php if ($_GET["Type"] === "Car") { echo "Carro"; } else if ($_GET["Type"] === "Motorcycle") { echo "Moto"; } else if ($_GET["Type"] === "Classic") { echo "Clássico"; } ?></button>
                </div>
            </div>
        </form>
    </div>

    
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
  <script src="lib/notify/js/jquery.notify.min"></script>
  <script src="js/util.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

  <script>
    function CreateAnnounce() {
      var form_data = new FormData($('#CreateAnnounceForm')[0]);
      $.ajax({
        type: 'POST',
        url: 'app/ClassifiedView.php',
        data: form_data,
        processData: false,
        cache: false,
        contentType: false
      }).done(function(data) {
        console.log(data);
        dataReturned = JSON.parse(data);
        if(dataReturned.status === 'success') {
          ToastSuccess(dataReturned.message);
          setTimeout(function() {
            window.location.href = 'classifieds.php?Type=<?php echo $_GET["Type"]; ?>';
          }, 2000);
        } else if(dataReturned.status === 'failure') {
          ToastFailure(dataReturned.message);
        }
      });
    }

    function readURL(input) {
      if (input.files) {
          var filesAmount = input.files.length;
          for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();
            reader.onload = function(event) {
              $($.parseHTML('<img>')).attr('src', event.target.result).attr("class", "w-25 mb-1 ml-1").appendTo("#ImageBox");
            }
            reader.readAsDataURL(input.files[i]);
          }
      }
    }

    function ClearImages() {
      $("#ImagePicker").val("");
      $("#ImageBox").empty();
    }

    $("#ImagePicker").change(function() {
      readURL(this);
    });
  </script>

</body>
</html>

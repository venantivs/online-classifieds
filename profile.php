<?php
  require_once "app/UserController.php";
  require_once "app/ClassifiedController.php";

  if (!isset($_SESSION)) {
    session_start();
  }

  if (!isset($_SESSION["UserID"]) || !is_numeric($_SESSION["UserID"]) || empty($_SESSION["UserID"])) {
    header("location: login.php");
    exit();
  }

  $UserController = new UserController();
  $UserModel = new UserModel();
  $UserModel->setUserID($_SESSION["UserID"]);
  if (($UserModel = $UserController->GetUserByID($UserModel)) == false) {
    header("location: 404.php");
    exit();
  }

  $ClassifiedController = new ClassifiedController();
  $UserClassifieds = $ClassifiedController->GetClassifiedsByUser($UserModel);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Perfil</title>
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
  <?php //include_once "include/nav_bar.php"; ?>
  <!--/ Nav End /-->

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single"><?php echo $UserModel->getUserFirstName() . " " . $UserModel->getUserLastName(); ?></h1>
            <span class="color-text-a">Usuário Cadastrado</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="#">Usuários</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                <?php echo $UserModel->getUserFirstName() . " " . $UserModel->getUserLastName(); ?>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Agent Single Star /-->
  <section class="agent-single">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="row">
            <div class="col-md-6">
              <div class="agent-avatar-box img-center">
                <?php if (empty($UserModel->getUserPicture())) { ?>
                <img src="img/iconfinder_instagram_252092.png" alt="">
                <?php } else { ?>
                <img src="assets/users/<?php echo $UserModel->getUserPicture(); ?>" alt="" class="avatar-image" height="400px">
                <?php } ?>
              </div>
            </div>
            <div class="col-md-5 section-md-t3">
              <div class="agent-info-box">
                <div class="agent-title">
                  <div class="title-box-d">
                    <h3 class="title-d"><?php echo $UserModel->getUserFirstName() . " " . $UserModel->getUserLastName(); ?>
                      <br> Info</h3>
                  </div>
                </div>
                <div class="agent-content mb-3">
                  <p class="content-d color-text-a">
                    <?php echo $UserModel->getUserFirstName() . " " . $UserModel->getUserLastName(); ?> é um usuário cadastrado, e portanto pode realizar anúncios online neste maravilhoso sistema. Entretanto, o mero fato deste usuário possuir cadastro não garante a idoneidade do mesmo.
                  </p>
                  <div class="info-agents color-a">
                    <p>
                      <strong>Inscrição: </strong>
                      <span class="color-text-a"><?php echo date_format(date_create($UserModel->getUserSignDate()), "d/m/Y"); ?></span>
                    </p>
                    <p>
                      <strong>Fone: </strong>
                      <span class="color-text-a"><?php echo $UserModel->getUserPhone(); ?></span>
                    </p>
                    <p>
                      <strong>Email: </strong>
                      <span class="color-text-a"><?php echo $UserModel->getUserEmail(); ?></span>
                    </p>
                    <form id="ChangePicForm" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="action" value="change_pic">
                      <div class="row">
                        <div class="col-s6">
                          <input type="file" id="UserPicture" name="fileImage" />
                        </div>
                        <div class="col-s4">
                          <button type="button" class="btn btn-b w-100" onclick="ChangeUserPic();">Mudar foto</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 section-t8">
          <div class="title-box-d">
            <h3 class="title-d">Meus Anúncios</h3>
          </div>
        </div>
        <div class="row property-grid grid">
          <?php for ($i = 0; $i < count($UserClassifieds); $i++) { ?>
          <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <?php if (count($UserClassifieds[$i]->getClassifiedPictures()) > 0) { ?>
                <img src="assets/classifieds/<?php echo $UserClassifieds[$i]->getClassifiedPictures()[0]; ?>" alt="" class="img-a h-100">
                <?php } else {  ?>
                  <img src="img/iconfinder_instagram_252092.png" alt="" class="img-a img-fluid">
                <?php } ?>
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <?php if ($UserClassifieds[$i]->getClassifiedType() === "Carro" || $UserClassifieds[$i]->getClassifiedType() === "Clássico") { ?>
                      <a href="#"><?php echo $UserClassifieds[$i]->getClassifiedCarYear() . " " . $UserClassifieds[$i]->getClassifiedCarBrand(); ?>
                        <br /> <?php echo $UserClassifieds[$i]->getClassifiedCarModel(); ?></a>
                      <?php } else { ?>
                        <a href="#"><?php echo $UserClassifieds[$i]->getClassifiedMotorcycleYear() . " " . $UserClassifieds[$i]->getClassifiedMotorcycleBrand(); ?>
                        <br /> <?php echo $UserClassifieds[$i]->getClassifiedMotorcycleModel(); ?></a>
                      <?php } ?>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a"><?php echo "R$ " . $UserClassifieds[$i]->getClassifiedPrice(); ?></span>
                    </div>
                    <a href="classified.php?auto_id=<?php echo $UserClassifieds[$i]->getClassifiedID(); ?>" class="link-a">Ver anúncio
                      <span class="ion-ios-arrow-forward"></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
          <!-- TERMINO -->
        </div>
      </div>
    </div>
  </section>
  <!--/ Agent Single End /-->

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
  <script src="lib/notify/js/jquery.notify.min"></script>
  <script src="js/util.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  <script>
    function ChangeUserPic() {
      var form_data = new FormData($('#ChangePicForm')[0]);
      $.ajax({
        type: 'POST',
        url: 'app/UserView.php',
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
            window.location.reload();
          }, 2000);
        } else if(dataReturned.status === 'failure') {
          ToastFailure(dataReturned.message);
        }
      });
    }
  </script>
</body>
</html>

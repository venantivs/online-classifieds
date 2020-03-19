<?php
  if (!isset($_SESSION)) {
    session_start();
  }
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <title>Login</title>
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
            <h1 class="title-single">Login</h1>
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
                Login
                </li>
            </ol>
            </nav>
        </div>
        </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <div class="container">
      <form id="LoginUserForm" class="form-a contactForm" action="" method="post" role="form">
        <input type="hidden" name="action" value="login">
        <div id="sendmessage">Your message has been sent. Thank you!</div>
        <div id="errormessage"></div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="form-group">
              <input type="email" name="txtEmail" class="form-control form-control-lg form-control-a" placeholder="Email" data-rule="email" data-msg="Email inválido.">
              <div class="validation"></div>
            </div>
          </div>
          <div class="col-md-12 mb-3">
            <div class="form-group">
              <input type="password" name="txtPassword" class="form-control form-control-lg form-control-a" placeholder="Senha" data-rule="password" data-msg="Please enter at least 8 chars of subject">
              <div class="validation"></div>
            </div>
          </div>
          <div class="col-md-12">
            <button type="button" class="btn btn-b w-100 mb-4" onclick="LoginUser();">Login</button>
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
  <script src="lib/notify/js/jquery.notify.min.js"></script>
  <script src="js/vue.js"></script>
  <script src="js/axios.min.js"></script>
  <script src="js/util.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

  <script>
    function LoginUser() {
      $.ajax({
        type: 'POST',
        url: 'app/UserView.php',
        data: $('#LoginUserForm').serialize()
      }).done(function(data) {
        console.log(data);
        dataReturned = JSON.parse(data);
        if(dataReturned.status === 'success') {
          ToastSuccess(dataReturned.message);
          setTimeout(function() {
            window.location.href = 'profile.php';
          }, 2000);
        } else if(dataReturned.status === 'failure') {
          ToastFailure(dataReturned.message);
        }
      });
    }
  </script>

</body>
</html>

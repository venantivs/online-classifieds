<?php
  if (!isset($_SESSION)) {
    session_start();
  }
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <title>Autoclassificados</title>
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

  <!--/ Carousel Star /-->
  <div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(img/sc0517-282506_1.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">Doral, Florida
                      <br> 78345</p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">1969 </span> Chevrolet
                      <br> Impala SS</h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">Comprar | $ 12.000</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(img/ARR135_Indian-5.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">Doral, Florida
                      <br> 78345</p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">2010 </span> Indian
                      <br> Chief Vintage</h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">Comprar | $ 12.000</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(img/chevrolet-onix-ltz-automatico-5876335d0dd70_album.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">Doral, Florida
                      <br> 78345</p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">2017 </span> Chevrolet
                      <br> Onix LTZ</h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">Comprar | $ 40.000</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Carousel end /-->
  
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
  <script src="js/vue.js"></script>
  <script src="js/axios.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

  <script>
    var app = new Vue({
      el: "#search-form",
      data: {
        CurrentBrands: [],
        CurrentYears: [],
        AutoSearch: {
          Type: "Carros",
          Brand: "",
          Model: "",
          Version: "",
          MinYear: "",
          MaxYear: "",
          MinPrice: "",
          MaxPrice: ""
        },
        CarBrands: ["Alfa Romeo", "Asia", "Audi", "BMW", "Chana", "Chery", "Chevrolet", "Chrysler", "Citroën", "Dodge", "Effa", "Engesa", "Fiat", "Ford", "Gurgel", "Hafei Towner", "Honda", "Hummer", "Hyundai", "JAC", "Jaguar", "Jeep", "Kia", "Lada", "Land Rover", "Lexus", "Lifan", "Mercedes-Benz", "Mitsubishi", "Nissan", "Peugeot", "Porsche", "Renault", "Suzuki", "Subaru", "Toyota", "Troller", "Volkswagen", "Volvo"],
        MotorcycleBrands: ["Agrale", "Amazonas", "BMW", "Bombardier", "Dafra", "Ducati", "Garelli", "Gas Gas", "Harley Davidson", "Honda", "Husqvarna", "Indian", "Kasinski", "Kawasaki", "KTM", "Royal Enfield", "Shineray", "Sundown", "Suzuki", "Triumph", "Vespa", "Yamaha"],
        ClassicsBrands: ["Alfa Romeo", "Bentley", "BMW", "Buick", "Cadillac", "Chevrolet", "Chrysler", "DKW", "Dodge", "Ferrari", "Fiat", "Ford", "Jaguar", "Jeep", "Gordini", "Lamborghini", "Land Rover", "Lincoln", "Mercedes-Benz", "MINI", "Oldsmobile", "Plymouth", "Pontiac", "Porsche", "Volkswagen"],
        CarYears: [],
        ClassicYears: [],
        MotorcycleYears: []
      },
      methods: {
        ChangeBrands: function() {
          if (this.AutoSearch.Type === "Carros") {
            this.CurrentBrands = this.CarBrands;
            this.CurrentYears = this.CarYears;
          } else if (this.AutoSearch.Type === "Motos") {
            this.CurrentBrands = this.MotorcycleBrands;
            this.CurrentYears = this.MotorcycleYears;
          } else if (this.AutoSearch.Type === "Clássicos") {
            this.CurrentBrands = this.ClassicsBrands;
            this.CurrentYears = this.ClassicYears;
          }
          this.AutoSearch.Brand = this.CurrentBrands[0];
          this.AutoSearch.MinYear = "Todos";
          this.AutoSearch.MaxYear = "Todos";
        },
        SearchAuto: function() {
          location.href = "classifieds.html?vehicle=" + this.RemoveAccent(this.AutoSearch.Type) + "&brand=" + this.AutoSearch.Brand + "&model=" + this.AutoSearch.Model + "&version=" + this.AutoSearch.Version + "&minyear=" + this.AutoSearch.MinYear + "&maxyear=" + this.AutoSearch.MaxYear + "&minprice=" + this.AutoSearch.MinPrice + "&maxprice=" + this.AutoSearch.MaxPrice;
        },
        RemoveAccent: function (Text) {                                                                   
          Text = Text.replace(new RegExp('[ÁÀÂÃ][áàâã]','gi'), 'a');
          Text = Text.replace(new RegExp('[ÉÈÊ][éèê]','gi'), 'e');
          Text = Text.replace(new RegExp('[ÍÌÎ][íìî]','gi'), 'i');
          Text = Text.replace(new RegExp('[ÓÒÔÕ][óòôõ]','gi'), 'o');
          Text = Text.replace(new RegExp('[ÚÙÛ][úùû]','gi'), 'u');
          Text = Text.replace(new RegExp('[Ç][ç]','gi'), 'c');
          return Text;                 
        } 
      },
      mounted: function() {
        this.ChangeBrands();
        for (var i = 0; i < (new Date().getFullYear()) - 1981 + 1; i++)
          this.CarYears[i] = 1981 + i;
        for (var i = 0; i < (new Date().getFullYear()) - 1885; i++)
          this.MotorcycleYears[i] = 1885 + i;
        for (var i = 0; i < 1981 - 1870; i++)
          this.ClassicYears[i] = 1870 + i;
        
        this.CarYears.reverse();
        this.MotorcycleYears.reverse();
        this.ClassicYears.reverse();
      }
    });
  </script>

</body>
</html>

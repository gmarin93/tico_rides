<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Tico-Ride</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=base_url()?>/assets/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/configacercade.css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="<?=base_url()?>/JS/bootstrap.min.js"></script>

  </head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>Tico-Ride</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>/assets/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/configacercade.css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/JS/bootstrap.min.js"></script>

    </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>


        <img src="<?=base_url()?>/IMAGES/log.PNG">
        <h5>Tico-Rides</h5>



    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">

        <li><a href="<?php echo site_url('Ride/index') ?>">Principal</a></li>
        <li><a href="<?php echo site_url('Ride/reg') ?>">Registro</a></li>
      </ul>
    </div>
  </div>
</nav>



<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="<?=base_url()?>/IMAGES/body3.jpg" alt="New York" width="1200" height="700">

      </div>

      <div class="item">
        <img src="<?=base_url()?>/IMAGES/zarcero.jpg" alt="New York" width="1200" height="700">

      </div>

      <div class="item">
        <img src="<?=base_url()?>/IMAGES/body.png" alt="Aereopuerto Juan SantaMaria" width="1200" height="700">

      </div>

      <div class="item">
        <img src="<?=base_url()?>/IMAGES/body4.jpg" alt="City mall" width="1200" height="700">

      </div>

      <div class="item">
        <img src="<?=base_url()?>/IMAGES/body2.jpg" alt="Los Angeles" width="900" height="600">

      </div>

      <div class="carousel-caption">


        <div class="Bienvenida">
          <h1>  Desarrollador:  Glenn Marin Arias </h1>

            <h1> Tutor: Bladimir Arroyo </h1></div>
            <br></br>
            <br></br>
          <div class="parrafo">

            <strong> <p>  Es un proyecto asignado en el curso de Diseño Web donde permite conseguir un ride de alguna persona
                  para viajar de un lugar a otro posiblemente de forma gratuita. Esta aplicación web no cuenta con
                  una base de datos en un servidor, si no que se basa en el almacenamiento de local storage. Cada usuario
                  se almacena con sus respectivos datos en un arreglo donde despues sera almacenado en un local storage.


                  Desarrollado el 21 de Agosto del 2016.</p></strong>

          </div>





      </div>
    </div>


</div>


<!-- Con
<div id="googleMap"></div>

<!-- Add Google Maps -->
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
var myCenter = new google.maps.LatLng(41.878114, -87.629798);

function initialize() {
var mapProp = {
center:myCenter,
zoom:12,
scrollwheel:false,
draggable:false,
mapTypeId:google.maps.MapTypeId.ROADMAP
};

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
position:myCenter,
});

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>

</footer>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip();

  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

</body>
</html>

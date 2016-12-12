<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registro-TicoRide</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>/assets/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/configperfil.css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?=base_url()?>/JS/bootstrap.min.js"></script>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <img src="<?=base_url()?>/IMAGES/log.PNG">
                <h5>Tico-Rides</h5> </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="<#">Rides
          <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('Ride/addride') ?>">Agregar</a></li>
                        
                         <li><a href="<?php echo site_url('Ride/editride') ?>">Editar</a></li>
                   
                        </ul>
                    </li>
                     <li><a href="<?php echo site_url('Ride/conf') ?>">Configuracion</a></li>
                      <li><a  href="<?php echo site_url('Ride/salir') ?>">Salir</a></li>
                   
                   
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
            <div class="item active"> <img src="<?=base_url()?>/IMAGES/body3.jpg" alt="New York" width="1200" height="700"> </div>
            <div class="item"> <img src="<?=base_url()?>/IMAGES/zarcero.jpg" alt="New York" width="1200" height="700"> </div>
            <div class="item"> <img src="<?=base_url()?>/IMAGES/body.png" alt="Aereopuerto Juan SantaMaria" width="1200" height="700"> </div>
            <div class="item"> <img src="<?=base_url()?>/IMAGES/body4.jpg" alt="City mall" width="1200" height="700"> </div>
            <div class="item"> <img src="<?=base_url()?>/IMAGES/body2.jpg" alt="Los Angeles" width="900" height="600"> </div>
            <div class="carousel-caption">
                 
                          
    
            
            <?php
                    
                if(isset($_SESSION['user'])) {
                    
                    $user=$_SESSION['user'];
                    //$foto=$_SESSION['user_foto'];
                   // var_dump($foto);
                    
                }
    
    ?>

    

            <h2 id="user1"><?php echo isset($user)?$user->usuario:''; ?></h2>

        <section>
           <div class="foto-perfil">
           <img id="logo-Uber" style="max-width: 10%;" src="">
            
           </div>

      </section>

                  <div class="container">
                       
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre Ride</th>
                                <th>Esta en</th>
                                <th>Va para</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td>John</td>
                                <td>Terminal de Buses</td>
                                <td>Universidad Catolica</td>
                                <td><a href="">ver</a></td>
                                <td><a href="">delete</a></td>
                            </tr>
                            <tr class="">
                                <td>Mary</td>
                                <td>Registro Civil</td>
                                <td>Coocique</td>
                                <td><a href="">ver</a></td>
                                 <td><a href="">delete</a></td>
                            </tr>
                            <tr class="">
                                <td>July</td>
                                <td>Pizza Hut</td>
                                <td>UTN</td>
                                <td><a href="">ver</a></td>
                                 <td><a href="">delete</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="<?=base_url()?>/JS/Logica.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBE4q3EdSiaMREAB5LWmTB6d5dqqZaa3HQ&libraries=places"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBE4q3EdSiaMREAB5LWmTB6d5dqqZaa3HQ&amp;signed_in=true&amp;libraries=places&amp;callback=initAutocomplete" async="" defer=""></script>
</body>

</html>
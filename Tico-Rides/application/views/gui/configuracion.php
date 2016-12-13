<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>Configuracion-TicoRide</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>/assets/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/configuracion-config.css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/JS/bootstrap.min.js"></script>
</head>

<body id="myPage" data-spy="scroll" onload="acces()" data-target=".navbar" data-offset="50">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <img src="<?=base_url()?>/IMAGES/log.PNG">
                <h5>Tico-Rides</h5> </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo site_url('Ride/perf') ?>">Perfil</a></li>
            </div>
        </div>
    </nav>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>
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
                    
                }
    
    ?>
                    <h2 id="user1"><?php echo isset($user)?$user->usuario:''; ?></h2>
                    <section> <img id="logo-Uber" src="<?=base_url()?>/IMAGES/uber-user.png">
                       
                       
                       
                        <form id="datos" method="post" action="<?php echo base_url()?>User/actualizarUser">
                            <div class="nombre">
                                <label for="driver-name">Nombre:</label>
                                <br></br>
                                <input id="nomconfig" type=" text" name="nombre" value="<?php echo isset($user)?$user->nombre:''; ?>" placeholder="Glenn Marin" value required>
                                <br/>
                                <br></br>
                                <div class="velocidad">
                                    <label for="driver-name">Velocidad:</label>
                                    <br></br>
                                    <input id="velconfig" type=" text" name="velocidad" value="<?php echo isset($user)?$user->velocidad:''; ?>" placeholder="km/h" required>
                                    <br/>
                                    <br></br>
                                </div>
                                <div class="acerca">
                                    <label for="address">Acerca de mi:</label>
                                    <br></br>
                                    <textarea id="acercaconfig" name="acerca" name="address" rows="4" cols="25" required><?php echo isset($user)?$user->acerca:''; ?></textarea>
                                    <br>
                                    <br/> </div>
                                <div class="guardar">
                                    <input class="btn" type="submit" name="button" value="Actualizar">
                                </div>
                                <div class="cancelar">
                                    <a class="btn" href="<?php echo site_url('Ride/act') ?>" name="button">Avanzada</a>
                                </div>
                            </div>
                        </form>
                    </section>
            </div>
        </div>
        <script src="/JS/Logica.js" charset="utf-8"></script>
</body>

</html>
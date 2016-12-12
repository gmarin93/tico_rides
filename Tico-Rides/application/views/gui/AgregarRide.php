<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>AgregarRide-TicoRide</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>/assets/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/AgregarRide.css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?=base_url()?>/JS/bootstrap.min.js"></script>
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
                    <li><a href="<?php echo site_url('Ride/editride') ?>">Editar</a></li>
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
                    
                }
    
    ?>
                    <h2 id="user1"><?php echo isset($user)?$user->usuario:''; ?></h2>
                    <section> <img id="logo-Uber" src="<?=base_url()?>/IMAGES/uber-user.png">
                        <form id="datos" method="post" action="">
                            <div class="nombre">
                                <label for="driver-name">Nombre Ride:</label>
                                <br></br>
                                <input id="nombreD" type=" text" name="rnombre" value="" placeholder="A la U" required>
                                <br/>
                                <br></br>
                            </div>
                            <div class="velocidad">
                                <label for="driver-name">Esta en:</label>
                                <br></br>
                                <input id="estoy" type=" text" name="resta" value="" placeholder="Pital" required>
                                <br/>
                                <br></br>
                            </div>
                            <div class="velocidad2">
                                <label for="driver-name">A donde va:</label>
                                <br></br>
                                <input id="voypara" type=" text" name="rva" value="" placeholder="San Jose" required>
                                <br/>
                                <br></br>
                            </div>
                            <div class="inicial">
                                <label for="driver-name">Hora inicial:</label>
                                <br></br>
                                <input id="horainD" type=" text" name="rinicia" value="" placeholder="4:00pm" required>
                                <br/>
                                <br></br>
                            </div>
                            <div class="salida">
                                <label for="driver-name">Hora Salida:</label>
                                <br></br>
                                <input id="horafinD" type=" text" name="rsalida" value="" placeholder="6:00pm" required>
                                <br/>
                                <br></br>
                            </div>
                            <div class="acerca">
                                <label for="address">Descripcion:</label>
                                <br></br>
                                <textarea id="infoD" name="radir" rows="4" cols="25" required></textarea>
                                <br>
                                <br/> </div>
                            <div class="dias">
                                <div class="">
                                    <div> Lunes
                                        <input id="lunes" type="checkbox" name="l" value="" required>
                                        <br/> </div>
                                    <div> Martes
                                        <input id="martes" type="checkbox" name="k" value="" required>
                                        <br/> </div>
                                    <div> Miercoles
                                        <input id="miercoles" type="checkbox" name="m" value="" required>
                                        <br/> </div>
                                    <div> Jueves
                                        <input id="jueves" type="checkbox" name="j" value="" required>
                                        <br/> </div>
                                    <div> Viernes
                                        <input id="viernes" type="checkbox" name="v" value="" required>
                                        <br/> </div>
                                    <div> Sabado
                                        <input id="sabado" type="checkbox" name="s" value="" required>
                                        <br/> </div>
                                    <div> Domingo
                                        <input id="domingo" type="checkbox" name="d" value="" required>
                                        <br/> </div>
                                </div>
                            </div>
                            <button onclick="inicialize()" class="btnimagen" type="submit">B</button>
                            <button onclick="inicialize()" class="btnimagen2" type="submit">B</button>
                            <div class="guardar">
                                <button onclick="agregarRide()" class="btn" type="button" name="button">Guardar</button>
                            </div>
                            <div class="cancelar">
                                <button onclick="limp()" class="btn" type="button" name="button">Cancelar</button>
                            </div>
            </div>
            </form>
            </section>
        </div>
    </div>
    <script src="/JS/Logica.js" charset="utf-8"></script>
</body>

</html>
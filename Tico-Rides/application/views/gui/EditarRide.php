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
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"> </head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <img src="<?=base_url()?>/IMAGES/log.PNG">
                <h5>Tico-Rides</h5> </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo site_url('Ride/perf') ?>">Perfil</a></li>
                    <li><a href="<?php echo site_url('Ride/addride') ?>">Guardar</a></li>
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
                    //$nombre=$_SESSION['nombre'];
                    //$info=$_SESSION[$nombre];
                    //$info= $ride;
                    //var_dump($info);
                
                }
    
    ?>
                    <h2 id="user1"><?php echo isset($user)?$user->usuario:''; ?></h2>
                    <section> <img id="logo-Uber" src="<?=base_url()?>/IMAGES/uber-user.png">
                        <?php
                  
                            foreach ($ride as $info): 
                             $dias= json_decode($info['dias']);  
                                   //var_dump($info['dias']);
                                   //echo $dias[2];
              ?>
                            <form id="datos" method="post" action="<?php echo base_url()?>ride/actualizarRide?id=<?php echo $info['id']; ?>">
                                <div class="nombre">
                                    <label for="driver-name">Nombre Ride:</label>
                                    <br></br>
                                    <input id="nombreD" type=" text" name="rnombre" value="<?php echo $info["nombre"] ?>" placeholder="A la U" required>
                                    <br/>
                                    <br></br>
                                </div>
                                <div class="velocidad">
                                    <label for="driver-name">Esta en:</label>
                                    <br></br>
                                    <input id="autocomplete" type=" text" name="resta" onfocus="geolocate()" value="<?php echo isset($info)?$info['ir']:''; ?>" placeholder="Pital" required>
                                    <br/>
                                    <br></br>
                                </div>
                                <div class="velocidad2">
                                    <label for="driver-name">A donde va:</label>
                                    <br></br>
                                    <input id="autocomplete2" onfocus="geolocate2()" type="text" name="rva" value="<?php echo isset($info)?$info['va']:''; ?>" placeholder="San Jose" required>
                                    <br/>
                                    <br></br>
                                </div>
                                <div class="inicial">
                                    <label for="driver-name">Hora inicial:</label>
                                    <br></br>
                                    <input id="horainD" type=" text" name="rinicia" value="<?php echo isset($info)?$info['hora_llegada']:''; ?>" placeholder="4:00pm" required>
                                    <br/>
                                    <br></br>
                                </div>
                                <div class="salida">
                                    <label for="driver-name">Hora Salida:</label>
                                    <br></br>
                                    <input id="horafinD" type=" text" name="rsalida" value="<?php echo isset($info)?$info['hora_salida']:''; ?>" placeholder="6:00pm" required>
                                    <br/>
                                    <br></br>
                                </div>
                                <div class="acerca">
                                    <label for="address">Descripcion:</label>
                                    <br></br>
                                    <textarea placeholder="Auto Toyota Terius Color Gris" id="infoD" name="rdir" rows="4" cols="25" required>
                                        <?php echo isset($info)?$info['descripcion']:''; ?>
                                    </textarea>
                                    <br>
                                    <br/> </div>
                                <div class="dias">
                                    <div class="">
                                        <div> Lunes
                                            <input id="lunes" type="checkbox" name="l" value="lunes" <?php if($dias[0]=="lunes" ){ echo 'checked="checked"';}?>>
                                            <br/> </div>
                                        <div> Martes
                                            <input id="martes" type="checkbox" name="k" value="martes" <?php if($dias[1]=="martes" ){ echo 'checked="checked"';}?> >
                                            <br/> </div>
                                        <div> Miercoles
                                            <input id="miercoles" type="checkbox" name="m" value="miercoles" <?php if($dias[2]=="miercoles" ){ echo 'checked="checked"';}?>>
                                            <br/> </div>
                                        <div> Jueves
                                            <input id="jueves" type="checkbox" name="j" value="jueves" <?php if($dias[3]=="jueves" ){ echo 'checked="checked"';}?>>
                                            <br/> </div>
                                        <div> Viernes
                                            <input id="viernes" type="checkbox" name="v" value="viernes" <?php if($dias[4]=="viernes" ){ echo 'checked="checked"';}?>>
                                            <br/> </div>
                                        <div> Sabado
                                            <input id="sabado" type="checkbox" name="s" value="sabado" <?php if($dias[5]=="sabado" ){ echo 'checked="checked"';}?>>
                                            <br/> </div>
                                        <div> Domingo
                                            <input id="domingo" type="checkbox" name="d" value="domingo" <?php if($dias[6]=="domingo" ){ echo 'checked="checked"';}?>>
                                            <br/> </div>
                                    </div>
                                </div>
                                <div class="guardar">
                                    <input class="btn" type="submit" name="button"> </div>
                                <div class="cancelar">
                                    <button onclick="limp()" class="btn" type="button" name="button">Cancelar</button>
                                </div>
            </div>
            <?php endforeach;?>
                </form>
                </section>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?=base_url()?>/JS/bootstrap.min.js"></script>
    <script src="<?=base_url()?>/JS/Logica.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBE4q3EdSiaMREAB5LWmTB6d5dqqZaa3HQ&libraries=places"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBE4q3EdSiaMREAB5LWmTB6d5dqqZaa3HQ&amp;signed_in=true&amp;libraries=places&amp;callback=initAutocomplete" async="" defer=""></script>
</body>

</html>
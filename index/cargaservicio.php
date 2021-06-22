<!--DE indexlogin2.php ME LO ENVIA ACA, QUE VOY A TENER LA PARTE DE CARGAR SERVICIOS-->
<?php 
    session_start(); 

          include '../conexion/errores.php';
          include '../conexion/validarfoto2.php';
          include '../conexion/database.php';
          require_once '../conexion/config.php';
          spl_autoload_register( function($clase){
              require_once "../conexion/$clase.php";
               });

    /*esto valida el usuario, sino existe, me manda a la pagina de iniciar sesion*/
    if( !$_SESSION['idUsuario'] && !$_SESSION['nombre'] ){
        header("Location: login.php");
        exit;
    }

    $db = new database( DB_HOST, DB_USER, DB_PASS, DB_NAME );

    $sId = $_SESSION['idUsuario'];
    $db->preparar("SELECT id_usuario, nombre, imagen FROM usuario WHERE id_usuario = ? ");
    $db->prep()->bind_param( 'i', $sId);
    $db->ejecutar();
    $db->prep()->bind_result( $uid, $uNombre, $uImagen);
    $db->resultado();
    $db->liberar();



    /*$db->preparar("SELECT id_usuario, nombre, email, telefono, id_provincia, direccion, id_sexo, id_rol FROM usuario");
    $db->ejecutar();
    $db->prep()->bind_result( $dbid, $dbnombre, $dbemail, $dbtelefono, $dbprovincia, $dbdireccion, $dbsexo, $dbrol);
    $db->resultado();
    $db->liberar();*/
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ArServicios - Cargar Servicios</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/loginestilos.css">
    <link rel="stylesheet" href="../conexion/estiloerror.css">
    <link rel="stylesheet" href="../css/indexloginphp.css">
</head>
<body>
   <!--  NAVEGACION  -->
   
   <a class=" logo" href="index.php">
        <span>Inicio</span> <i class="fas fa-home"></i>
        </a>  <!-- ME MANDA A index.php-->
   
   <nav class="" style="background-color: rgb(7, 4, 39);  height:50px;">
   <div >
        <div class="card-body px-lg-5 pt-0" style="text-align: right;">
        
        <a class="btn btn-primary" href="../index/login.php" style="margin-top:10px; padding:0;margin-right:20px; ">Volver <i class="fas fa-arrow-circle-left"></i></a>  <!-- ME MANDA A login.php-->
 <a class="btn btn-danger" href="logout.php" style="margin-top:10px; padding:0;margin-right:-40px;">Cerrar Sesión <i class="fas fa-sign-out-alt"></i> </a>  <!-- ME MANDA A logout.php-->
      </div>
       <div class="card-body px-lg-5 pt-0" style="text-align: left;">
        
      </div>
    </div>
   </nav>
    <!-- FIN NAVEGACION  -->

    <!-- IZQUIERDA -->
    
   <div class="izq">
       
        <!--va a mostrar la direccion de la imagen guardada, para ver eso linea 110 de registro.php.-->
          <img class=" img-responsive rounded-circle" src='<?php echo "$uImagen"; ?>' alt="" style="display:block;
            margin:auto; width:180px; margin-top:15px;">
        <br>
       <center > 
        <!-- Material form login -->
        <div class="" style="padding: 0;border: 0;">

         <!--va a mostrar un cartel de bienvenida con el nombre que tiene en la base de datos-->
          <h5 class="">
            <strong>Usuario: <?php echo ucwords($uNombre); ?></strong>
            <br><br>
            <!--Tambien muestra el rol del usuario que lo obtiene de iniciar.php-->
            <strong>Rol: <?php echo ucwords($_SESSION['rol']); ?> </strong>
          </h5>
          
        <br>
        </div>
       </center>
   </div> 
   
   <!-- FIN IZQUIERDA -->
   
   
   
   <!-- CARGAR SERVICIO -->
    <div class="der">
        <img src="../imagenes/logoAr.png" alt="Logo de ArServicios" style="display:block;
        margin:auto; width:180px; margin-top:-55px">
        
        
           <br><br><br>
           


  
   <center> 
    <!-- Material form login -->
    <div class="card col-md-6 col-center" style="padding: 0;border: 0;">

      <h5 class="card-header info-color white-text text-center py-4" style="background-color: #e2db36;">
        <strong>Cargar Servicio</strong>
      </h5>

      <!--Card content-->
      <div class="card-body px-lg-5 pt-0">
      
       <?php
          
          
          /*TODOS LOS DATOS VIAJAN POR EL POST Y CON EL EXTR_OVERWRITE LOS CONVERTIMOS EN VARIABLES*/
          if( $_POST ){
              //convertir array en variables
              /*https://www.php.net/manual/es/function.extract.php
              mirar eso para entender el codigo*/
              extract( $_POST, EXTR_OVERWRITE);
            
              /* CODIGO PARA SUBIR FOTO Y GUARDARLA EN UNA CARPETA*/
              if(!file_exists("FotosServicios")){
                  mkdir("FotosServicios", 0777);
              }
              
              $nombreservicios = strtolower($nombreservicios);
              
              
              /*FIN CODIGO VALIDAR FOTO*/  /*RESTO DEL CODIGO EN ../conexion/validarfoto2.php*/
              
            /*instanciamos la clase*/   /*En el video 254 lo mueve de abajo, para arriba*/
            $db = new database( DB_HOST, DB_USER, DB_PASS, DB_NAME );
              
            /*VALIDAR DATOS*/
              if( $nombreservicios && $id_categoria && $direccionservicio && $ubicacionmaps) {
                 /* echo "entro2";*/
                  
                /*  trigger_error($nombreservicios, E_USER_NOTICE);*/
                                  /*se valida la foto, esto esta en ../conexion/validarfoto.php (arriba llamo esa clase)*/
                                  if (validarFoto( $nombreservicios )){
                                      
                                      
                                      /*cargamos los datos en la base de datos servicios*/
                                      if( $db->preparar( "INSERT INTO servicio VALUES (NULL, '$nombreservicios' , '$id_categoria' , '$direccionservicio' , '$ubicacionmaps' , '$rutaSubida' ) " )){ /*rutasubida en validarfoto.php*/
                                          
                                          $db->ejecutar();
                                          
                                          trigger_error("REGISTRO EXITOSO", E_USER_NOTICE);
                                          /*Si se carga se manda un ok en la parte 197*/
                                          $ok=true;
                         
                                          /*cerramos la coneccion a la base de datos una ves que ya esta echa la consulta*/
                                          $db->cerrar();
                                   
                                          
                                      }
                                      
                                  }else{
                                      echo $error;
                                  }
                    
              }
          }
          
        ?>
        
        
        <!-- ACA HAGO UNA CONSULTA PARA OBTENER EL ULTIMO ID QUE SE REGISTRO EN SERVICIOS Y EL VALOR LO GUARDO EN LA VARIABLE $uidser-->
        <?php
            $db = new database( DB_HOST, DB_USER, DB_PASS, DB_NAME );

            $sId = $_SESSION['idUsuario'];
            $db->preparar("SELECT MAX(id_servicio) AS id FROM servicio ");
            $db->prep()->bind_param( 'i', $sId);
            $db->ejecutar();
            $db->prep()->bind_result( $uidser);
            $db->resultado();
            $db->liberar();
            $db->cerrar();
          
          ?>
        
        <!--ACA ME MANDA CUANDO SE INSERTAN LOS DATOS CORRECTAMENTE, SI ESO PASA SE MANDA UN OK ACA-->
        <!--cuando llega el ok pasa esto-->
        <?php if($ok) : ?>
        <!--se manda un saludo, con el nombre de la persona y se muestra la foto del servicio que acaba de subir y ademas se cargan los datos a la tabla usuario_servicios-->
            <h2> <?php echo ucwords($uNombre) ?></h2>
            <br>
            <p>
                Su servicio se a registrado correctamente.
            </p>
            <img class="img-responsive" src="<?php echo $rutaSubida ?>" alt="" style="display:block;
margin:auto; width:180px; margin-top:15px;">
        
          <!--ACA SE INSERTAN LOS DATOS EN LA TABLA USUARIOS_SERVICIOS-->
          <?php 
          $db = new database( DB_HOST, DB_USER, DB_PASS, DB_NAME );
          $db->preparar( "INSERT INTO usuario_servicio VALUES ('$uid' , '$uidser' ) " );
                                          
          $db->ejecutar();
                                          
          /*cerramos la coneccion a la base de datos una ves que ya esta echa la consulta*/
          $db->cerrar();
          
          
          
          
          ?>
          
           
            <li class="" style="color:#ffffff;"><a href="../index/login.php" class="">Pagina de Inicio</a></li>
        
       <?php else : ?>
       
       
       
       
       
        <!-- Form -->
        <!--enctype="multipart/form-data" es para que acepte archivos multimedia-->
        <form class="text-center" enctype="multipart/form-data" method="post" style="color: #757575;" action="#!">
            <br>
          <!-- text -->
          <!--<div class="md-form">
            <input name="id_usuario" type="text" id="" class="form-control" placeholder="id_usuario">
          </div>
            <br>-->
            
            <!-- NOMBRE DEL SERVICIO -->
          <div class="md-form">
            <input name="nombreservicios" type="text" id="" class="form-control" placeholder="Nombre del Servicio">
          </div>
           
            <br>
            
            <!-- CATEGORIA DEL SERVICIO -->
          <div class="md-form" style="text-align: left;">
          <label for="">Selecciona la categoria de su servicio</label>
             <select name="id_categoria" id="">
               <option value="0"> Seleccione:</option>
                <?php
                 $mysqli = new mysqli('localhost', 'root', '', 'arservicios');
                 /*https://www.baulphp.com/llenar-select-html-con-mysql-php-ejemplos/*/
                     $query = $mysqli->query("SELECT * FROM categoria");
                     while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="'.$valores[id_categoria].'">'.$valores[nombre].'</option>';
                     }
                 
                ?>   
             </select>
          </div>
            <br>
            <!--direccion-->
          <div class="md-form">
            <input name="direccionservicio" type="text" id="" class="form-control" placeholder="Direccion">
          </div>
            <br>
           
            
             <div class="md-form">
             <label for="">Elija la foto de su servicio</label>
            <input name="fotoservicio" type="file" id="" class="form-control">
          </div>
            <br>
            <div class="ratio ratio-4x3">
             <label for="">¿Como Subir Direccion de Google Maps?</label>
             <br>
              <iframe
                src="../imagenes/Mi%20video1.mp4"
                title="Como Subir Direccion de Google Maps"
                
              ></iframe>
            </div>
            <div class="md-form">
            <input name="ubicacionmaps" type="text" id="" class="form-control" placeholder="Ubicacion del Servicio en Google Maps">
          </div>
            
           

          <!-- Sign in button -->
          <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Registrar Servicio</button>
          
        </form>
        <!-- Form -->
     
       <?php /*echo $ubicacion."<br>";*/ ?>
       
        
              
        <?php endif; ?>

     
     
     
      </div>

    </div>
<!-- Material form login -->
   </center>
          
           
       </div>
       
       
        
       
       
       
    <!--script de jquery para que funcione el boton de inicio por ejemplo-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5db1674db6.js" crossorigin="anonymous"></script> <!--PARA LOS LOGOS DE CERRAR SESION, pagina de https://fontawesome.com/ donde el juanpi me ayudo con los iconos-->
</body>
</html>
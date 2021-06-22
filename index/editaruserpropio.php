<!--DE indexlogin.php y indexlogin2.php ME LO ENVIA ACA, QUE VOY A TENER LA PARTE DE EDITAR EL USUARIO PERSONAL DE CADA UNO-->
<?php 
    session_start(); 

          include '../conexion/errores.php';
          include '../conexion/validarfoto.php';
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
    $db->prep()->bind_param( 'i', $sId); /*para añadir o agregar mas variables a la consulta que estamos haciendo*/
    $db->ejecutar();
    $db->prep()->bind_result( $uid, $uNombre, $uImagen); /*Para vincular el resultado*/
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
    <title>ArServicios - Editar su Usuario</title>
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
    <!--  NAVEGACION  -->

    
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
   
    <div class="der">
        <img src="../imagenes/logoAr.png" alt="Logo de ArServicios" style="display:block;
        margin:auto; width:180px; margin-top:-55px">
        <div class="cabecera-pagina">
            <h1 class="titulo-pagina"> 
                Administracion
                <small>Bienvenido a la administracion de ArServicios</small>
            </h1>
            
        </div>
        <div class="container-fluid">
         
         
         
         
          
           <!--SI APRETAMOS EL BOTON editar PASA ESTO-->
           
           <?php if(isset($_GET['editar']) ) : ?>
           
           <center> 
    <!-- Material form login -->
    <div class="card col-md-6 col-center" style="padding: 0;border: 0;">

      <h5 class="card-header info-color white-text text-center py-4" style="background-color: #e2db36;">
        <strong>Editar su Usuario</strong>
      </h5>

      <!--Card content-->
      <div class="card-body px-lg-5 pt-0"> 
           
           <div class="">
               <div class="col-centrar">
               
               <?php 
                   
                   $eID = $_GET['editar'];
                   
                    $db->preparar("SELECT nombre,email,telefono,direccion FROM usuario WHERE id_usuario = ? ");
                    $db->prep()->bind_param( 'i', $eID);
                    $db->ejecutar();
                    $db->prep()->bind_result($enombre, $eemail, $etelefono,  $edireccion);
                    $db->resultado();
                    $db->liberar();
                   /*ESTOS DATOS SE VAN A MOSTRAR COMO BORROSOS*/
                   ?>
               
               
               <!-- Form -->
        <!--enctype="multipart/form-data" es para que acepte archivos multimedia-->  <!--ESTO VA A IR A ACTUALIZAR.PHP-->
        <form class="text-center" enctype="multipart/form-data" method="post" style="color: #757575;" action="actualizar.php">
            <br>
          <!-- text -->
          <!--<div class="md-form">
            <input name="id_usuario" type="text" id="" class="form-control" placeholder="id_usuario">
          </div>
            <br>-->
            <!--nombre-->
           
           <div class="md-form">
           <label for="">Nombre</label>
            <input name="nombre" type="text" id="" class="form-control" placeholder="<?php echo "$enombre"; ?>">
          </div>
           
            <br>
            <!--contraseña-->
          <div class="md-form">
           <label for="">Contraseña</label>
            <input name="contrasena" type="password" id="" class="form-control" placeholder="Contraseña">
          </div>
          
           <br>
          
           <div class="md-form">
           <label for="">Confirmar Contraseña</label>
            <input name="confircontrasena" type="password" id="" class="form-control" placeholder="Confirmar Contraseña">
          </div>
           
            <br>
            
            <!--email-->
          <div class="md-form">
           <label for="">Email</label>
            <input name="email" type="text" id="" class="form-control" placeholder="<?php echo "$eemail"; ?>">
          </div>
           
            <br>
            
            <!--telefono-->
          <div class="md-form">
           <label for="">Telefono</label>
            <input name="telefono" type="number" id="" class="form-control" placeholder="<?php echo "$etelefono"; ?>">
          </div>
           
            <br>
            
            <!--provincias--> <!--ESTE CODIGO LO TRAJE DE registro.php como todo lo de arriba y abajo-->
          <div class="md-form" style="text-align: left;">
          <label for="">Provincia</label>
             <select name="id_provincia" id="">
               <option value="0"> Seleccione:</option>
                <?php
                 $mysqli = new mysqli('localhost', 'root', '', 'arservicios');
                 /*https://www.baulphp.com/llenar-select-html-con-mysql-php-ejemplos/*/
                     $query = $mysqli->query("SELECT * FROM provincia");
                     while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="'.$valores[id_provincia].'">'.$valores[nombre].'</option>';
                     }
                ?>   
             </select>
          </div>
           
            <br>
            
            <!--direccion-->
          <div class="md-form">
           <label for="">Direccion</label>
            <input name="direccion" type="text" id="" class="form-control" placeholder="<?php echo "$edireccion"; ?>">
          </div>
           
            <br>
            
            <!--sexo-->
          <div class="md-form" style="text-align: left;">
          <label for="">Sexo</label>
             <select name="id_sexo" id="">
               <option value="0"> Seleccione:</option>
                <?php
                 
                     $query = $mysqli->query("SELECT * FROM sexo");
                     while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="'.$valores[id_sexo].'">'.$valores[nombre].'</option>';
                     }
                ?>   
             </select>
            <!--<input name="id_sexo" type="text" id="" class="form-control" placeholder="Sexo">-->
          </div>
           <!--video 265-->
        <div class="md-form">
            <input name="id" type="hidden" id="" class="form-control" value="<?php echo "$eID"; ?>">
          </div>
           
            <br>
            
             <div class="md-form">
             <label for="">Elija su foto de perfil</label>
            <input name="foto" type="file" id="" class="form-control">
          </div>
            <br>

          <!-- Sign in button -->
          <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Actualizar</button>


        </form>
        <!-- Form -->
        </div>
    </div>
        
        </div>
    </div>
<!-- Material form login -->
   </center>
        
         <!--LO DE ACA SE VA A actualizar.php-->
         
         
         
         
         
          
      <!--ACA ESTA LA ACCION AL APRETAR EL BOTON ELIMINAR -->    
         <?php elseif($_GET['confireliminar']) : ?>
          
          <div class="row">
             <div class="col-sm-5 col-centrar">
                <div class="caja text-center">
                     <h2>¿Seguro deseas eliminar este usuario? <br>Si lo haces los servicios cargados por el seguiran estando, se recomienda eliminar antes los servicios</h2>
                     <a class='btn btn-danger' href='<?php echo "editaruserpropio.php?eliminar={$_GET['confireliminar']}"; ?>'>Sí</a>
                     <a class='btn btn-info' href="editaruserpropio.php">No</a>
                 </div>
             </div>
              
          </div>
          
          
          <?php elseif($_GET['eliminar']) : ?>
          
          <div class="row">
             <div class="col-sm-5 col-centrar">
                <div class="caja text-center">
                    <?php 
                    
                    $eliminar = $_GET['eliminar'];
                    
                    
                    
                    $db->preparar("SELECT nombre FROM usuario WHERE id_usuario = ? ");
                    $db->prep()->bind_param( 'i', $eliminar);
                    $db->ejecutar();
                    $db->prep()->bind_result($name);
                    $db->resultado();
                    $db->liberar();
                    
                    
                    
                    
                    $db->preparar("DELETE FROM usuario WHERE id_usuario = ?");
                    $db->prep()->bind_param( 'i', $eliminar);
                    $db->ejecutar();
                    if($db->filasAfectadas() > 0 ){
                        trigger_error("Eliminacion Correcta, seras redireccionado en 5 segundos", E_USER_NOTICE);
                        header("Refresh:5; url=../index/login.php.php");
                        
                        borrarCarpetas( "fotos/$name");
                    }else{
                        trigger_error("Eliminacion Correcta, seras redireccionado en 5 segundos", E_USER_NOTICE);
                        header("Refresh:5; url=../index/login.php.php");
                        borrarCarpetas( "fotos/$name");
                    }
                    $db->liberar();
                    
                    
                    ?>
                 </div>
             </div>
              
          </div>
          
          
          
          
          
          
           <!--SINO PRECIONA editar PASA ESTO-->
           <?php else : ?>
           
            <div class="row">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="caja">
                           <div class="caja-cabecera">
                               <h3><i class="fas fa-exclamation"></i>     Acciones</h3>
                          
                          <!--<nav class="">
                              <form class="form-inline pull-right">
                                <input class="form-control mr-sm-4" type="search" placeholder="Buscar" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                              </form>
                          </nav>-->
                          
                          
                           </div>
                           <div class="caja-cuerpo">
                               <table class="table table-cell">
                                   <thead>
                                       <tr>
                                         
                                           <th>Editar su Usuario <?php echo "<a class='btn btn-success' href='editaruserpropio.php?editar=$uid'><i class='fas fa-edit'></i></a>" ?></th>
                                           <th>Eliminar su Usuario <?php echo "<a class='btn btn-danger' href='editaruserpropio.php?confireliminar=$uid'><i class='fas fa-trash'></i></a>" ?></th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                      
                                            
                                   </tbody>
                               </table> 
                               
                               
                           </div>
                       </div>
                   </div>
               </div>
               
               
             <?php endif; ?>  
               
               
        </div>
           
       </div>
       
       
        
       
       
       
    <!--script de jquery para que funcione el boton de inicio por ejemplo-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5db1674db6.js" crossorigin="anonymous"></script> <!--PARA LOS LOGOS DE CERRAR SESION, pagina de https://fontawesome.com/ donde el juanpi me ayudo con los iconos-->
</body>
</html>
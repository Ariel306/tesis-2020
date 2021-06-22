<!--registrarse.php es registro.php-->
<?php
  $mysqli = new mysqli('localhost', 'root', '', 'arservicios');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ArServicios - Registro</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/loginestilos.css">
    <link rel="stylesheet" href="../conexion/estiloerror.css">
</head>
<body>
    
   <img src="../imagenes/logoAr.png" alt="Logo de ArServicios" style="display:block; margin:auto; width:180px; margin-top:15px;">
  
  <br>
   <center> 
    <!-- Material form login -->
    <div class="card col-md-6 col-center" style="padding: 0;border: 0;">

      <h5 class="card-header info-color white-text text-center py-4" style="background-color: #e2db36;">
        <strong>Registrate</strong>
      </h5>

      <!--Card content-->
      <div class="card-body px-lg-5 pt-0">
      
       <?php
          
          include '../conexion/errores.php';
          include '../conexion/validarfoto.php';
          require_once '../conexion/config.php';
          spl_autoload_register( function($clase){
              require_once "../conexion/$clase.php";
          });
          
          /*TODOS LOS DATOS VIAJAN POR EL POST Y CON EL EXTR_OVERWRITE LOS CONVERTIMOS EN VARIABLES*/
          if( $_POST ){
              //convertir array en variables
              /*https://www.php.net/manual/es/function.extract.php
              mirar eso para entender el codigo*/
              extract( $_POST, EXTR_OVERWRITE);
            
              /* CODIGO PARA SUBIR FOTO Y GUARDARLA EN UNA CARPETA*/
              if(!file_exists("fotos")){
                  mkdir("fotos", 0777);
              }
              
              $nombre = strtolower($nombre);
              
              
              /*FIN CODIGO VALIDAR FOTO*/  /*RESTO DEL CODIGO EN ../conexion/validarfoto.php*/
              
            /*instanciamos la clase*/   /*En el video 254 lo mueve de abajo, para arriba*/
            $db = new database( DB_HOST, DB_USER, DB_PASS, DB_NAME );
              
              
            /*VALIDAR DATOS*/
              if( $nombre && $contrasena && $confircontrasena && $email && $telefono && $id_provincia && $direccion && $id_sexo && $id_rol) {
                  
                          /*COMPROBAR CORREO ELECTRONICO*/ /*https://www.jose-aguilar.com/blog/validar-email-php/*/
                          function comprobar_email($email){
                           $mail_correcto = 0;
                           //compruebo unas cosas primeras
                           if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){
                              if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) {
                                 //miro si tiene caracter .
                                 if (substr_count($email,".")>= 1){
                                    //obtengo la terminacion del dominio
                                    $term_dom = substr(strrchr ($email, '.'),1);
                                    //compruebo que la terminación del dominio sea correcta
                                    if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){
                                       //compruebo que lo de antes del dominio sea correcto
                                       $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
                                       $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
                                       if ($caracter_ult != "@" && $caracter_ult != "."){
                                          $mail_correcto = 1;
                                       }
                                    }
                                 }
                              }
                           }
                           if ($mail_correcto){
                               return 1;
                           }else{
                               return 0;
                           }

                        }   
                      //FIN COMPROBAR CORREO ELECTRONICO
                  
                  //$expreg = '/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0- 9 _-] +) * \\. ([Az] {2,6}) $ / '; ESTA ERA OTRA COMPROBACION EMAIL
                  /*comprobamos email con la funcion de arriba*/
                  if( comprobar_email($_POST['email'])){
                      /*decimos que la contraseña tiene que se mayor a 6*/
                      if( strlen( $contrasena)>6){
                          /*si es mayor a 6 se comprueba que las 2 contraseñas sean iguales*/
                          if( $contrasena == $confircontrasena){
                              
                              $validarEmail = $db->validarDatos( 'email', 'usuario', $email);
                              /*validamos para que el email no este repetido*/
                              if( $validarEmail == 0){
                                  /*se valida la foto, esto esta en ../conexion/validarfoto.php (arriba llamo esa clase)*/
                                  if (validarfoto( $nombre )){
                                      //echo "<img class='img-responsive' src='$rutaSubida' alt=''>";
                                      
                                      $fecha = time();
                                      $intentos=0;
                                      $fechahora=0;
                                      
                                      /*cargamos los datos en la base de datos*/
                                      if( $db->preparar( "INSERT INTO usuario VALUES (NULL, '$nombre' , '$contrasena' , '$email' , '$telefono' , '$id_provincia' , '$direccion' , '$id_sexo' , '$id_rol' , '$rutaSubida' , '$fecha', '$intentos', '$fechahora' ) " )){ /*rutasubida en validarfoto.php*/
                                          
                                          $db->ejecutar();
                                          
                                          trigger_error("TE HAS REGISTRADO", E_USER_NOTICE);
                                          /*Si se carga se manda un ok en la parte 197*/
                                          $ok=true;
                                          /*cerramos la coneccion a la base de datos una ves que ya esta echa la consulta*/
                                            $db->cerrar();
                                      }
                                      
                                  }else{
                                      echo $error;
                                  }
                              }else{
                                  trigger_error("Error: Ese email ya esta registrado, prueba con otro", E_USER_NOTICE);
                              }
                          }else{
                              trigger_error("Error: Las contraseñas no coinciden", E_USER_ERROR);
                          }
                      }else{ 
                          trigger_error("Error: La contraseña tiene que ser mayor a 6 caracteres", E_USER_ERROR);
                      }
                  }else{
                      trigger_error("Error: Email erroneo, por favor ingresa un email valido", E_USER_ERROR);
                  }   
              }
          }
          
          
          
          /*CREAMOS UN OBJETO DE LA CLASE DATABASE*/
          //$db = new database( DB_HOST, DB_USER, DB_PASS, DB_NAME );
          
          /*OBTENEMOS EL VALOR DE LA TABLA PROVINCIA, database.php esta el codigo*/
          /*$array = $db->getProvincias();
          
          echo "<table class='table table=cell'
                    <thead>
                        <tr>
                            <td>id</td>
                            <td>Nombre</td>
                        </tr>
                        <tbody>
          ";
          
          foreach( $array as $v){
              echo "<tr>";
              foreach( $v as $v2 ){
                  echo "<td>$v2</td>";
              }
                echo "</tr>";
          }
          echo "</tbody>
                </table>";*/
          
          /*OBTENEMOS EL VALOR DE LA TABLA USUARIO, database.php esta el codigo*/
          /*$array = $db->getUsuario();
          
          echo "<table class='table table=cell'
                    <thead>
                        <tr>
                            <td>id</td>
                            <td>Nombre</td>
                            <td>Contraseña</td>
                            <td>Correo Electronico</td>
                            <td>Telefono</td>
                            <td>id_provincia</td>
                            <td>Direccion</td>
                            <td>id_sexo</td>
                            <td>id_rol</td>
                        </tr>
                        <tbody>
          ";
          
          foreach( $array as $v){
              echo "<tr>";
              foreach( $v as $v2 ){
                  echo "<td>$v2</td>";
              }
                echo "</tr>";
          }
          echo "</tbody>
                </table>";*/
          
        ?>
       <!--cuando llega el ok pasa esto-->
        <?php if($ok) : ?>
        <!--se manda un saludo, con el nombre de la persona y se muestra la foto que acaba de subir-->
            <h2>Saludos <?php echo $nombre ?></h2>
            <img class="img-responsive" src="<?php echo $rutaSubida ?>" alt="" style="display:block;
margin:auto; width:180px; margin-top:15px;">
            <p>
                Te has registrado correctamente, por favor dale click al boton para ir a la pagina de inicio y poder loguearte.
            </p>
            <li class="" style="color:#ffffff;"><a href="../index/index.php" class="">Pagina de Inicio</a></li>
        
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
            <!--nombre-->
          <div class="md-form">
            <input name="nombre" type="text" id="" class="form-control" placeholder="Nombre y Apellido">
          </div>
            <br>
            <!--contraseña-->
          <div class="md-form">
            <input name="contrasena" type="password" id="" class="form-control" placeholder="Contraseña">
          </div>
            <br>
          <div class="md-form">
            <input name="confircontrasena" type="password" id="" class="form-control" placeholder="Confirmar Contraseña">
          </div>
            <br>
            <!--email-->
          <div class="md-form">
            <input name="email" type="text" id="" class="form-control" placeholder="Correo Electronico">
          </div>
            <br>
            <!--telefono-->
          <div class="md-form">
            <input name="telefono" type="number" id="" class="form-control" placeholder="Telefono">
          </div>
            <br>
            <!--provincias-->
          <div class="md-form" style="text-align: left;">
          <label for="">Provincia</label>
             <select name="id_provincia" id="">
               <option value="0"> Seleccione:</option>
                <?php
                 
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
            <input name="direccion" type="text" id="" class="form-control" placeholder="Direccion">
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
            <br>
            <!--Rol-->
          <div class="md-form" style="text-align: left;">
          <label for="">Su rol por defecto es Usuario</label>
           <select name="id_rol">
               <option value="2">Usuario</option> 
           </select>
            <!--<input name="id_rol" type="text" id="" class="form-control" placeholder="Rol">-->
          </div>
            <br>
            
             <div class="md-form">
             <label for="">Elija su foto de perfil</label>
            <input name="foto" type="file" id="" class="form-control">
          </div>
            <br>

          <!-- Sign in button -->
          <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Registrate</button>
          
          <a href="login.php" style="text-decoration:none;"> Click aquí, si ya tienes una cuenta</a>
          


        </form>
        <!-- Form -->
     
        
              
        <?php endif; ?>

     
     
     
      </div>

    </div>
<!-- Material form login -->
   </center>
    
         
       
       
    <!--script de jquery para que funcione el boton de inicio por ejemplo-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>
</html>
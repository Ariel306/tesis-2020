<!--login.php es iniciar.php-->
<!--video -->

<!--     INICIAR.PHP recibe de LOGIN.PHP y solo verifica los datos. Luego los envia a INDEXLOGIN.PHP          -->
<!--ponemos session_start para iniciar las sesiones-->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ArServicios - Login</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/loginestilos.css">
    <link rel="stylesheet" href="../../conexion/estiloerror.css">
</head>
<body>
    
   <img src="../../imagenes/logoAr.png" alt="Logo de ArServicios" style="display:block;
margin:auto; width:180px; margin-top:15px;">


<br>
   <center> 
    <!-- Material form login -->
    
    <div class="card col-md-6 col-center" style="padding: 0;border: 0;">
          

<?php

          include '../../conexion/errores.php';
          include '../../conexion/validarfoto.php';
          include '../../conexion/database.php';
          require_once '../../conexion/config.php';
          spl_autoload_register( function($clase){
              require_once "../../conexion/$clase.php";
               });
          
     if( $_POST ){
        //convertir array en variables
        /*https://www.php.net/manual/es/function.extract.php
        mirar eso para entender el codigo*/
       extract( $_POST, EXTR_OVERWRITE);
              
       $nombre = strtolower($nombre);
              
       if( empty($email) and empty($contrasena)){
           trigger_error("Los campos no pueden estar vacios. Seras redireccionado en 3 segundos", E_USER_ERROR);
           header("Refresh:3; url=../login.php");
       } 
         
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
         
         
         if( $email && $contrasena){
             
             $db = new database( DB_HOST, DB_USER, DB_PASS, DB_NAME );
             
             $validarEmail = $db->validarDatos( 'email', 'usuario', $email);
            
            
         
            //$expreg = '/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0- 9 _-] +) * \\. ([Az] {2,6}) $ / '; ESTA ERA OTRA COMPROBACION EMAIL
            /*comprobamos email con la funcion de arriba*/
            if( comprobar_email($_POST['email'])){
            /*validamos para que el email no este repetido*/
                if( $validarEmail != 0){
                       
                    /*si el email es valido (osea, esta en la base de datos) hace la consulta*/
                     $db->preparar("SELECT id_usuario, nombre, contrasena, email, id_rol, imagen, intentos, fechahora FROM usuario WHERE email = '$email' ");
                     $db->ejecutar();
                     $db->prep()->bind_result( $id, $dbnombre, $dbcontrasena, $dbemail, $dbrol, $dbrutaimg, $dbintentos, $dbfechahora);
                     $db->resultado();
                    /*aca hacemos una segunda validacion del email por las dudas*/
                    if( $email == $dbemail){
                        
                        
                                /* https://www.diariodeunprogramador.net/como-sumar-segundos-minutos-horas-semanas-meses-y-anos-a-una-fecha-en-php/ */
                                /*creo una variable y se asigno el horario que tiene en la base de datos mas 10 minutos*/
                                $fechaAuxiliar	= strtotime ( "10 minutes" , strtotime ( $dbfechahora ) ) ;	
                                /*creo otra variable y guardo la recien creada con el formato que yo quiero*/
                                $fechaSalida 	= date ( 'Y-m-d H:i:s' , $fechaAuxiliar );
                                /*tuve que cambiar la fecha del xampp porque me daba problemas */
                                /*creo otra variable y le guardo el horario del servidor local xampp*/
                                $hoy = date('Y-m-d H:i:s');
                        
                                /*si el horario del servidor local xampp es mayor que el de la base de datos mas 10 minutos, significa que ya pasaron los 10 minutos, entonces vuelvo los valores de intentos y fehcahora a 0*/
                                        if($hoy > $fechaSalida){
                                            $db->liberar();
                                            /*NOW() lo saque de https://es.stackoverflow.com/questions/108657/insertar-fecha-actual-en-una-tabla-mysql-php*/
                                            $db->preparar("UPDATE usuario SET intentos=0, fechahora=0 WHERE id_usuario = '$id'");
                                            $db->ejecutar();
                                            $db->liberar();
                                            $dbintentos=0;
                                        }
                   
                        
                        /*creo una tabla donde se va a almacenar la cantidad de intentos fallidos y la fechahora de la ultima entrada fallida*/
                        /*http://www.forosdelweb.com/f18/limitar-numero-intentos-para-acceder-566756/*/
                        /*tengo que poner menor porque si pongo menos y igual, cuando llegue a 3 se va a sumar 4*/
                        
                        if($dbintentos<3){
                            /*luego validamos que la contraseña ingresada sea la que se encuentra en la base de datos, sino es asi, se manda un error*/
                            if( $contrasena == $dbcontrasena){

                                /*se crean las variables de SESSIONES*/
                                $_SESSION['idUsuario'] = $id;
                                $_SESSION['nombre'] = $dbnombre;
                                /*Si dbrol es igual a 2 pasa una cosa y si es igual a 1 pasa otra*/
                                if($dbrol == 2){
                                    $rolfinal = "Usuario";
                                    /*esto lo voy a mandar a nav.php
                                    $nav=true;*/
                                }else{
                                    $rolfinal = "Administrador";
                                }
                                $_SESSION['rol'] = $rolfinal; /*La informacion de $rolfinal se guarda en $_SESSION['rol'] asique cuando lo llamen va a tener ese valor*/
                                $_SESSION['imagen'] = $dbrutaimg;

                                $caduca = time()*365*24*60*60;

                                if( $recordar == 'activo') {
                                    setcookie('id', $_SESSION['idUsuario'], $caduca);
                                    setcookie('nombre', $_SESSION['nombre'], $caduca);
                                    setcookie('img', $_SESSION['imagen'], $caduca);
                                }


                                /*cerramos la coneccion a la base de datos una ves que ya esta echa la consulta*/
                                $db->cerrar();

                                /*cuando todo este okey, lo vamos a mandar a la pagina de indexlogin.php*/
                                /*header("Location: indexlogin.php");*/

                                /*ACA VOY A AGREGAR UNA VALIDACION, SI ES ROL 2 ME VA A MANDAR A CARGAR LOS SERVICIOS, PERO SI ES ROL 1 ME VA A MANDAR A MODIFICAR LOS SERVICIOS*/

                                if($dbrol == 2){
                                    header("Location: indexlogin2.php");
                                }else{
                                    header("Location: indexlogin.php");
                                }


                                /*CODIGO PARA SUMAR INTENTOS DE INICIO*/
                            }else{
                                
                                /*hay que liberar, si ponemos $db->cerrar(); se cierra la coneccion con la base de datos y la vamos a tener que habrir de nuevo*/
                                $db->liberar();
                                /*NOW() lo saque de https://es.stackoverflow.com/questions/108657/insertar-fecha-actual-en-una-tabla-mysql-php*/
                                $db->preparar("UPDATE usuario SET intentos=intentos+1, fechahora=NOW() WHERE id_usuario = '$id'");
                                $db->ejecutar();
                                $db->liberar();
                                trigger_error("Esta contraseña no coincide con la del correo, por favor intenta nuevamente. Seras redireccionado en 5 segundos ", E_USER_ERROR);
                                /*me permite refrescar la pagina y que sea direccionado a donde quiera*/
                                header("Refresh:5; url=../login.php");
                            }
                            
                        }else{ /*NUEVO DE INTENTOS*/
                                
                                trigger_error("Cantidad de accesos fallidos alcanzada, por favor espere 10 minutos para volver a intentar. Seras redireccionado en 5 segundos ", E_USER_ERROR);
                                /*me permite refrescar la pagina y que sea direccionado a donde quiera*/
                                header("Refresh:5; url=../login.php");
               
                                    
                            }
                        
                        
       
                    }
                    
                    
                }else{
                      trigger_error("Este email no existe, por favor ingresa otro o registrate. Seras redireccionado en 5 segundos", E_USER_ERROR);
                    /*me permite refrescar la pagina y que sea direccionado a donde quiera*/
                    header("Refresh:5; url=../login.php");
                }
            }else{
                  trigger_error("Email erroneo, por favor ingresa un email valido. Seras redireccionado en 5 segundos", E_USER_ERROR);
                /*me permite refrescar la pagina y que sea direccionado a donde quiera*/
                header("Refresh:5; url=../login.php");
            }
         }
         
     }
         
        
?>

  
  

     <img src="../index.php" alt="">
     
     
      <!--Card content-->
      <div class="card-body px-lg-5 pt-0">

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
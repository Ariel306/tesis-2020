
<!--cuando apretamos el boton de actualizar pasa esto-->

<!--LO QUE PASA ACA ES QUE SE ACTUALIZAN LOS DATOS-->
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ArServicios - Actualizar</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/loginestilos.css">
    <link rel="stylesheet" href="../conexion/estiloerror.css">
</head>
<body>

<center>
    <?php 

include '../conexion/errores.php';
include '../conexion/validarfoto.php';
include '../conexion/database.php';
require_once '../conexion/config.php';
spl_autoload_register( function($clase){
    require_once "../conexion/$clase.php";
     });

if ($_POST['id']) { 
            
    extract( $_POST, EXTR_OVERWRITE ) ;
    
    /*foreach( $_POST as $k => $v){
        echo "$k => $v<br>";
    }*/ /*PARA VER LOS DATOS DE LA BASE DE DATOS*/
             
    $db = new database( DB_HOST, DB_USER, DB_PASS, DB_NAME );
    
             
    $db->preparar("UPDATE usuario 
                    SET nombre = ?,
                    contrasena = ?,
                    email = ?,
                    telefono = ?,
                    id_provincia = ?,
                    direccion = ?, 
                    id_sexo = ?,
                    imagen = ?
                    WHERE id_usuario = ? ");
    $db->prep()->bind_param( 'sssiisisi', $nombre, $contrasena, $email, $telefono, $id_provincia, $direccion,$id_sexo, $rutaSubida, $id); /*aca tuve un problema y la solucion fue agregar imagen=? y ademas tenia que poner si o si $rutaSubida, sino no me funcionaba, pero no estoy muy seguro porque pasaba eso*/
    
    if( empty( $_FILES['nombre'])) {
        
        /*if(validarfoto( $nombre)){*/
            
            /*VALIDAR DATOS*/  /*AGREGADO RECIEN*/
              if( $nombre && $contrasena && $confircontrasena && $email && $telefono && $id_provincia && $direccion && $id_sexo && $id) {
                  
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
                              
                              /*$validarEmail = $db->validarDatos( 'email', 'usuario', $email);
                              validamos para que el email no este repetido
                              if( $validarEmail == 0){*/
                                  /*se valida la foto, esto esta en ../conexion/validarfoto.php (arriba llamo esa clase)*/
                                  if (validarfoto( $nombre )){
                                      //echo "<img class='img-responsive' src='$rutaSubida' alt=''>";
                                      
                                      $fecha = time();
                                      
                                      /*cargamos los datos en la base de datos*/
                                          
                                          $db->ejecutar();
                                          
                                          /*trigger_error("SE HAN ACTUALIZADO LOS DATOS", E_USER_NOTICE);*/
                                      
                                          $db->liberar();

                                          trigger_error("Salio todo perfecto, seras redireccionado en 5 segundos", E_USER_NOTICE);
/*                                          trigger_error($foto, E_USER_NOTICE); PROBANDO*/

                                          header("Refresh:5; url=editar.php");
                                      
                                  }else{
                                      trigger_error("Error: Los datos no cargaron de manera correcta", E_USER_ERROR);
                                  }
                              /*}else{
                                  trigger_error("Error: Ese email ya esta registrado, prueba con otro", E_USER_NOTICE);
                              }*/
                          }else{
                              trigger_error("Error: Las contraseñas no coinciden", E_USER_ERROR);
                          }
                      }else{ 
                          trigger_error("Error: La contraseña tiene que ser mayor a 6 caracteres", E_USER_ERROR);
                      }
                  }else{
                      trigger_error("Error: Email erroneo, por favor ingresa un email valido", E_USER_ERROR);
                  }   
              }else{
                  trigger_error("Error: Hay un problema con los datos a actualizar", E_USER_ERROR);
                    
              }
            
            /*$db->ejecutar();
            $db->liberar();

            $ok = "Salio todo perfecto";

            header("Refresh:5; url=editar.php");*/
                
       /* }else{
           $ok = "Error";
        }*/
    
    

}else{
    trigger_error("Error: Ocurrio un problema, seras redireccionado en 5 segundos", E_USER_ERROR); 
    header("Refresh:5; url=editar.php");
}

    

}
            
    ?>
</center>


</body>
 
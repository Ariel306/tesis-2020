
<!--cuando apretamos el boton de actualizar pasa esto-->

<!--LO QUE PASA ACA ES QUE SE ACTUALIZAN LOS DATOS-->
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ArServicios - Actualizar Servicio</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/loginestilos.css">
    <link rel="stylesheet" href="../conexion/estiloerror.css">
</head>
<body>

<center>
    <?php 

include '../conexion/errores.php';
include '../conexion/validarfoto2.php';
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
    
             
    $db->preparar("UPDATE servicio 
                    SET nombre = ?,
                    id_categoria = ?,
                    direccion = ?, 
                    maps = ?,
                    imagens = ?
                    WHERE id_servicio = ? ");
    $db->prep()->bind_param( 'sisssi', $nombre, $id_categoria, $direccion,$maps, $rutaSubida, $id); /*aca tuve un problema y la solucion fue agregar imagen=? y ademas tenia que poner si o si $rutaSubida, sino no me funcionaba, pero no estoy muy seguro porque pasaba eso*/
    
    if( empty( $_FILES['nombre'])) {
        
        /*if(validarfoto( $nombre)){*/
            
            /*VALIDAR DATOS*/  /*AGREGADO RECIEN*/
              if( $nombre && $id_categoria && $direccion && $maps && $id) {
           
                              /*$validarEmail = $db->validarDatos( 'email', 'usuario', $email);
                              validamos para que el email no este repetido
                              if( $validarEmail == 0){*/
                                  /*se valida la foto, esto esta en ../conexion/validarfoto2.php (arriba llamo esa clase)*/
                                    /*trigger_error($nombre, E_USER_NOTICE);*/
                                  if (validarfoto( $nombre )){
                                      //echo "<img class='img-responsive' src='$rutaSubida' alt=''>";
                                      
                                      $fecha = time();
                                      
                                      /*cargamos los datos en la base de datos*/
                                          
                                          $db->ejecutar();
                                          
                                          /*trigger_error("SE HAN ACTUALIZADO LOS DATOS", E_USER_NOTICE);*/
                                      
                                          $db->liberar();

                                          trigger_error("Se edito el servicio seleccionado, seras redireccionado en 5 segundos", E_USER_NOTICE);

                                          header("Refresh:5; url=../index/admin/indexlogin2.php");
                                      
                                  }else{
                                      trigger_error("Error: Los datos no cargaron de manera correcta", E_USER_ERROR);
                                  }
                              /*}else{
                                  trigger_error("Error: Ese email ya esta registrado, prueba con otro", E_USER_NOTICE);
                              }*/
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
    header("Refresh:5; url=editarservicio.php");
}

    

}
            
    ?>
</center>


</body>
 
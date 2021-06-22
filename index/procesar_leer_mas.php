<!--ESTO ES PARA UN FUTURO AGREGAR COMENTARIO Y CALIFICACION POR ESTRELLAS-->
                                       
<!--https://www.youtube.com/watch?v=hDAi6dkbImY-->
                                       <?php 
                                        $aId = $_SESSION['idUsuario'];
                                        /*esto valida el usuario, sino existe, me manda a la pagina de iniciar sesion*/
                                        if( !$_SESSION['idUsuario'] && !$_SESSION['nombre'] ){/*si la session no esta iniciada no hace nada*/
                                            echo "<h5>Registrate para calificar y comentar este servicio </h5>";

                                        }else{ /*Si esta iniciada va a mostrar la calificacion*/
                                            echo "<br /><h5 class='mt-0'>Califica este servicios: </h5>";
                                            echo "<br>";
                                           echo "
                                                

                                                <div>
                                                
                                                    <form action='../index/procesar_leer_mas.php' method='post'>
                                                        <p class='clasificacion'>

                                                          <input id='radio1' type='radio' name='estrella' value='5'>
                                                          <label for='radio1'>★</label>
                                                          <input id='radio2' type='radio' name='estrella' value='4'>
                                                          <label for='radio2'>★</label>
                                                          <input id='radio3' type='radio' name='estrella' value='3'>
                                                          <label for='radio3'>★</label>
                                                          <input id='radio4' type='radio' name='estrella' value='2'>
                                                          <label for='radio4'>★</label>
                                                          <input id='radio5' type='radio' name='estrella' value='1'>
                                                          <label for='radio5'>★</label>
                                                        </p>
                                                       <textarea name='comentario' placeholder='Comentario....'></textarea>
                                                       <br />
                                                        <input type='text' name='nombre_user' placeholder='Nombre Completo....'>
                                                        <input name='id_servicio' type='hidden' id=' class='form-control' value='$eID'>
                                                        
                                                        <button value='Comentar' type='submit'>Comentar</button>
                                                    </form>
                                                </div>
                                      
                                    
                                                ";
                                        }

                                    ?>  




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


    <?php 

include '../conexion/errores.php';
include '../conexion/validarfoto2.php';
include '../conexion/database.php';
require_once '../conexion/config.php';
spl_autoload_register( function($clase){
    require_once "../conexion/$clase.php";
     });

if ($_POST['id_servicio']) { 
            
    extract( $_POST, EXTR_OVERWRITE ) ;
    
    /*foreach( $_POST as $k => $v){
        echo "$k => $v<br>";
    }*/ /*PARA VER LOS DATOS DE LA BASE DE DATOS*/
             
    $db = new database( DB_HOST, DB_USER, DB_PASS, DB_NAME );
    
             
    $db->preparar("INSERT INTO comentario 
                    VALUES (NULL, estrella = ?,
                    nombre_user = ?,
                    comentario = ?, 
                    id_servicio = ? )");
    
    
    $db->ejecutar();
                                          
    $db->liberar();

     trigger_error("Se cargo el comentario, seras redireccionado en 5 segundos", E_USER_NOTICE);

     header("Refresh:5; url=../index/index.php");                                     
    


   }
            
    ?>



</body>
 
<!--  ESTO ES PARA CERRAR LA SESION: PROBAR DE LA SIQUIENTE MANERA. INGRESAMOS A http://localhost/ArServicios/index/login.php Y ENTRAMOS CON UN USUARIO QUE QUERAMOS,
   ESTO NOS VA A MANDAR A LA PAGUINA http://localhost/ArServicios/index/admin/indexlogin.php SI EL USUARIO ESTA BIEN INGRESADO. LUEGO PONEMOS http://localhost/ArServicios/index/index.php
    Y VAMOS A VER QUE NOS MANDA A LA PAGUINA PRINCIPAL, AHORA ENTREMOS DE NUEVO A http://localhost/ArServicios/index/admin/indexlogin.php Y VAMOS A VER QUE LA SESION SIGUE ACTIVA, PERO SI
    PONEMOS EN EL BOTON [  CERRAR SESION  ] Y INTENTAMOS HACER ESTO DE NUEVO, NO VAMOS A PODER  -->
<?php 
    session_start(); 


    $caduca = time()-95365;
                            
    if( isset($_COOKIE['nombre'])) {
        setcookie('id', $_SESSION['idUsuario'], $caduca);
        setcookie('nombre', $_SESSION['nombre'], $caduca);
        setcookie('img', $_SESSION['imagen'], $caduca);
    }


    session_unset();
    session_destroy();

    header("Refresh:5; url=index.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ArServicios - Cerrar Sesión</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/loginestilos.css">
    <link rel="stylesheet" href="../../conexion/estiloerror.css">
</head>
<body>
    
   <img src="../imagenes/logoAr.png" alt="Logo de ArServicios" style="display:block;
margin:auto; width:180px; margin-top:15px;">


<br>
   <center> 
    <!-- Material form login -->
    
    <div class="card col-md-6 col-center" style="padding: 0;border: 0;">
          
        <h4>Has cerrado sesión y seras redireccionado en 5 seg. a la página de inicio.</h4>
     
     
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
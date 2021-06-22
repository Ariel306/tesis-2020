<?php 
    session_start();
    if( (isset($_SESSION['nombre']) && isset($_SESSION['idUsuario']) ) || isset($_COOKIE['nombre']) || isset($_SESSION['rol']) ){ /*si se cierra la ventana solo queda activo el cookie con el nombre guardado 1 año*/
        
        if( isset($_COOKIE['nombre'])){
            $_SESSION['idUsuario'] = $_COOKIE['id'];
            $_SESSION['nombre'] = $_COOKIE['nombre'];
            $_SESSION['imagen'] = $_COOKIE['img'];
        }
          
        
        /*ACA MODIFIQUE ALGO, AL TENER 2 USUARIOS. si cualquiera de los 2 usuarios cierra el navegador o aprieta inicio (boton que se encuentra en indexlogin.php) y luego ingresa si usuario va a seguir registrado, entonces si pone registrarse para que no ocacione problemas me tendria que mandar al inicio de seseion, ahora viene la validacion. si es rol Usuario me manda a indexlogin2.php y sino es administrador y me manda a indexlogin.php*/
        
        if($_SESSION['rol'] == "Usuario"){
            header( "Location: ../index/admin/indexlogin2.php" );
        }else{
            header( "Location: ../index/admin/indexlogin.php" );
        }
        
        
        /*esto se hace para no generar problemas, ya que si un usuario ya esta cargado y quiere entrar a el login y coloca otro usuario
        esto va a generar un conflicto y posibles errores, haciendo esto. Decimos que si hay algun usuario cargado no lo deje entrar a login.php y lo mande a indexlogin.php*/ 
        
         /*header( "Location: ../index/admin/indexlogin.php" );*/
        
    }
?>

<!DOCTYPE html> <!--index.php es login.php-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ArServicios - Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/loginestilos.css">
</head>
<body>
    
   <img src="../imagenes/logoAr.png" alt="Logo de ArServicios" style="display:block;
margin:auto; width:180px; margin-top:15px;">
  
  <br>
   <center> 
    <!-- Material form login -->
    <div class="card col-md-6 col-center" style="padding: 0;border: 0;">

      <h5 class="card-header info-color white-text text-center py-4" style="background-color: #e2db36;">
        <strong>Iniciar Sesion</strong>
      </h5>

      <!--Card content-->
      <div class="card-body px-lg-5 pt-0">

        
        
        
        <!-- Form -->
        <form class="text-center" method="post" style="color: #757575;" action="../index/admin/iniciar.php"> <!--me manda a iniciar.php y de ahi a indexlogin.php-->
            <br>
          <!-- Email -->
          <div class="md-form">
            <input name="email" type="text" id="" class="form-control" placeholder="Su Correo Electronico">
          </div>
            <br>
          <!-- Password -->
          <div class="md-form">
            <input name="contrasena" type="password" id="" class="form-control" placeholder="Su Contraseña">
          </div>
        <br>
          <!--<div class="d-flex justify-content-around">
            <div>
              <div class="form-check">
                
                <label class="form-check-label" for="">
                    <input name="recordar" type="checkbox" value="activo"> Mantener sesión iniciada PENSANDO EN SACARLO
                </label> --><!--va para iniciar.php-->  <!--260-->
             <!-- </div>
            </div>-->
            <!--<div>
               Forgot password 
              <a href="" style="text-decoration:none;">¿Olvidaste tu contraseña?</a>
            </div>-->
          <!--</div>-->

          <!-- Sign in button -->
          <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Iniciar Sesion</button>

          <!-- Register -->
          <p>¿Crear una cuenta?
            <a href="registro.php" style="text-decoration:none;">Registrarse</a>
            <br>
            <a href="index.php" style="text-decoration:none;"> Volver Inicio</a>
          </p>

          <!-- Social login 
          <p>o inicia sesion con:</p>
          <a type="button" class="btn-floating btn-fb btn-sm">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a type="button" class="btn-floating btn-tw btn-sm">
            <i class="fab fa-twitter"></i>
          </a>
          <a type="button" class="btn-floating btn-li btn-sm">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a type="button" class="btn-floating btn-git btn-sm">
            <i class="fab fa-github"></i>
          </a>-->

        </form>
        <!-- Form -->

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
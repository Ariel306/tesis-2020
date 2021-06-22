<!--DE indexlogin2.php ME LO ENVIA ACA, QUE VOY A TENER LA PARTE DE EDITAR LOS SERVICIOS-->
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
    $db->preparar("SELECT id_usuario,nombre, imagen FROM usuario WHERE id_usuario = ? ");
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
    <title>ArServicios - Editar Usuario</title>
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
        
        <a class="btn btn-primary" href="../index/admin/indexlogin2.php" style="margin-top:10px; padding:0;margin-right:20px; ">Volver <i class="fas fa-arrow-circle-left"></i></a>  <!-- ME MANDA A indexlogin2.php-->
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
           
           <?php if(isset($_GET['editarservicio']) ) : ?>
           
           <center> 
    <!-- Material form login -->
    <div class="card col-md-6 col-center" style="padding: 0;border: 0;">

      <h5 class="card-header info-color white-text text-center py-4" style="background-color: #e2db36;">
        <strong>Editar Servicio</strong>
      </h5>

      <!--Card content-->
      <div class="card-body px-lg-5 pt-0"> 
          
           <div class="">
               <div class="col-centrar">
               
               <?php 
                   
                   /*Esta consulta se hace de nuevo porque ahora se trae la informacion sola del servicio*/
                   $eID = $_GET['editarservicio'];
                   
                    $db->preparar("SELECT servicio.nombre, servicio.id_categoria, servicio.direccion, servicio.maps, categoria.nombre as categoriaName FROM servicio  INNER JOIN categoria ON servicio.id_categoria=categoria.id_categoria WHERE id_servicio = ? ");
                    $db->prep()->bind_param( 'i', $eID);
                    $db->ejecutar();
                    $db->prep()->bind_result($enombre, $ecategoria, $edireccion, $emaps, $ecategorianame);
                    $db->resultado();
                    $db->liberar();
                   /*ESTOS DATOS SE VAN A MOSTRAR COMO BORROSOS*/
                   ?>
               
               
               <!-- Form -->
        <!--enctype="multipart/form-data" es para que acepte archivos multimedia-->  <!--ESTO VA A IR A ACTUALIZARSERVICIO.PHP-->
        <form class="text-center" enctype="multipart/form-data" method="post" style="color: #757575;" action="actualizarservicio.php">
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
            
            <!--categoria--> <!--ESTE CODIGO LO TRAJE DE registro.php como todo lo de arriba y abajo-->
          <div class="md-form" style="text-align: left;">
          <h6>Su categoria es <?php echo "$ecategorianame"; ?></h6>
          <label for="">Categoria</label>
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
           <label for="">Direccion</label>
            <input name="direccion" type="text" id="" class="form-control" placeholder="<?php echo "$edireccion"; ?>">
          </div>
             <br>
            
            <!--direccion-->
          <div class="md-form">
           <label for="">Direccion Google Maps</label>
            <input name="maps" type="text" id="" class="form-control" placeholder="<?php echo "$emaps"; ?>">
          </div>
           
            <br>
            
            
           <!--video 265-->
        <div class="md-form">
            <input name="id" type="hidden" id="" class="form-control" value="<?php echo "$eID"; ?>">
          </div>
           
            <br>
            
             <div class="md-form">
             <label for="">Elija la foto de su servicio</label>
            <input name="fotoservicio" type="file" id="" class="form-control"> <!--NOTA, REVISAR QUE LAS IMAGENES SEAN JPEG O PNG -->
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
        <!-- Form -->
        
         <!--LO DE ACA SE VA A actualizarservicio.php-->
         
         
         
         
         
          
      <!--ACA ESTA LA ACCION AL APRETAR EL BOTON ELIMINAR -->    
         <?php elseif($_GET['confireliminarservicio']) : ?>
          
          <div class="row">
             <div class="col-sm-5 col-centrar">
                <div class="caja text-center">
                     <h2>¿Seguro deseas eliminar este servicio?</h2>
                     <!--cuidado aca el problema que tive fue que donde decia php echo "editarservicio.php?eliminar=  tenia php echo "editar.php?eliminar= -->
                     <a class='btn btn-danger' href='<?php echo "editar2.php?eliminar={$_GET['confireliminarservicio']}"; ?>'>Sí</a>
                     <a class='btn btn-info' href="editar2.php">No</a>
                 </div>
             </div>
              
          </div>
          
          
          <?php elseif($_GET['eliminar']) : ?>
          
          <div class="row">
             <div class="col-sm-5 col-centrar">
                <div class="caja text-center">
                    <?php 
                    
                    $eliminar = $_GET['eliminar'];
                    
                    
                    
                    $db->preparar("SELECT nombre FROM servicio WHERE id_servicio = ? ");
                    $db->prep()->bind_param( 'i', $eliminar);
                    $db->ejecutar();
                    $db->prep()->bind_result($name);
                    $db->resultado();
                    $db->liberar();
                    
                    
                    
                    
                    $db->preparar("DELETE FROM servicio WHERE id_servicio = ?");
                    $db->prep()->bind_param( 'i', $eliminar);
                    $db->ejecutar();
                    if($db->filasAfectadas() > 0 ){
                        trigger_error("Eliminacion Correcta, seras redireccionado en 5 segundos", E_USER_NOTICE);
                        header("Refresh:5; url=../index/admin/indexlogin2.php");
                        
                        borrarCarpetas( "FotosServicios/$name");
                    }else{
                        trigger_error("Eliminacion Correcta, seras redireccionado en 5 segundos", E_USER_NOTICE);
                        header("Refresh:5; url=../index/admin/indexlogin2.php");
                        borrarCarpetas( "FotosServicios/$name");
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
                               <h3><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>  Edita o elimina algún servicio</h3>
                          
                          <!--<nav class="">
                              <form class="form-inline pull-right">
                                <input class="form-control mr-sm-4" type="search" placeholder="Buscar" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                              </form>
                          </nav>-->
                          <!--<div class="">
                              <div class="">
                                  <input type="text" class="" placeholder="Ingrese su busqueda...">
                                  <span class="">
                                      <button class="" type="submit">Buscar</button>
                                  </span>
                              </div>
                          </div>-->
                          
                           </div>
                           <div class="caja-cuerpo">
                               <table class="table table-cell">
                                   <thead>
                                       <tr>
                                           <th>#</th>
                                           <th>Nombre Usuario</th>
                                           <th>Nombre Servicio</th>
                                           <th>Direccion</th>
                                           <th>Acciones</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                      
                                      <?php
                                       
                                       /*VAMOS A USAR OTRA CONSULTA, DEL VIDEO 267*/  /*ESTO ES PARA MOSTRAR 5 RESULTADOS NADA MAS*/
                                       
                                       $db->preparar("SELECT COUNT(id_usuario) FROM usuario_servicio WHERE id_usuario = ('$uid') "); /*A diferencia del indexlogin comun que trae todos los usuarios, aca solo necesito traer los servicios de X usuario, para asi contarlos y podes mostrarlos cada $porPagina que yo quiera. Para ver la diferencia solo ver este mismo codigo en indexlogin.php. Basicamente le agrege usuario_servicio WHERE id_usuario = ('$uid') */
                                        $db->ejecutar();
                                        $db->prep()->bind_result($contador);
                                        $db->resultado();
                                        $db->liberar();
                                        $porPagina = 5;
                                        $paginas =  ceil($contador/$porPagina);
                                        $pagina = (isset ($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
                                        $iniciar = ($pagina-1) * $porPagina;

                                        /*ESTA CONSULTA DE BASE DE DATOS, ME AHORRA HACER LAS VALIDACIONES PARA LAS PROVINCIAS, SEXO Y ROLES. OSEA ME PERMITE TRAER DIRECTAMENTE EL NOMBRE EN VEZ DE TRAER EL NUMERO Y TENER QUE VALIDAD A QUE PERTENECE CADA NUMERO*/

                                    /*CONSULTA PARA OBTENER EL id_usuario y id_servicio de la tabla usuario_servicio y ademas el nombre de la tabla usuario y el nombre y direccion de la tabla servicio. PERO TODA ESTA INFORMACION SE TRAE SEGUN EL ID DEL USUARIO*/

                                        $db->preparar("SELECT us.id_usuario, us.id_servicio,
                                                          user.nombre,
                                                          ser.nombre, ser.direccion
                                                   FROM usuario_servicio us
                                                   INNER JOIN usuario user ON us.id_usuario = user.id_usuario
                                                   INNER JOIN servicio ser ON us.id_servicio = ser.id_servicio
                                                   WHERE us.id_usuario = ('$uid') LIMIT $iniciar, $porPagina ");  /*LINEA 44 DE DONDE SALE $UID*/
                                        $db->ejecutar();
                                        $db->prep()->bind_result( $iduser, $idser,$unombre,$snombre,$sdireccion);

                                       /*ACA TUVE UN PROBLEMA Y ES QUE EL $dbid NO ME ENTREGABA NINGUN VALOR, ESTO ERA PORQUE NO DECLARE LA LLAMADA A LA BASE DE DATOS Y TAMPOCO LA VARIABLE, ENTONCES ME MANDABA 0 Y NO ME DEJABA EDITAR*/
                                            $conteo=$iniciar; /*en editar.php linea 361 explico porque el iniciar. Pero basicamente es para que se vayan sumando los valores*/
                                                
                                            while( $db->resultado() ){ /*database.php*/
                                                $conteo++;
                                                echo "<tr>
                                                       <td>$conteo</td> 
                                                       <td>$unombre</td>
                                                       <td>$snombre</td>
                                                       <td>$sdireccion</td>
                                                       <td>
                                                       <a class='btn btn-success' href='editar2.php?editarservicio=$idser'><i class='fas fa-edit'></i></a>
                                                       <a class='btn btn-danger' href='editar2.php?confireliminarservicio=$idser'><i class='fas fa-trash'></i></a>
                                                       </td>
                                                      </tr>"; /*lo que tiene <i> son imagenes*/
                                            }
                                            $db->liberar();
                                       ?>
                                            
                                   </tbody>
                               </table> 
                               
                               <?php 
                               
                               $anterior = ($pagina-1);
                               $siguiente = ($pagina+1);
                               
                               ?>
                               
                               <nav aria-label="Page navigation example">
                                  <ul class="pagination">
                                  
                                   <?php if( !($pagina<=1)) :?>
                                   
                                    <li class="page-item"><a class="page-link" href='<?php echo "?pagina=$anterior" ?>'>Anterior</a></li>

                                    <?php endif; ?>  
                                    
                                    <?php
                                      if( $paginas >=1){
                                          for($x=1; $x<=$paginas; $x++){
                                              echo ($x == $pagina) ? "<li class='page-item'><a class='page-link' href='?pagina=$x'>$x</a></li>" : "<li class='page-item'><a class='page-link' href='?pagina=$x'>$x</a></li>";
                                          }
                                      }
                                      
                                      ?>
                                    
                                    
                                    
                                    <?php if( !($pagina>=$paginas)) :?>
                                 
                                    <li class="page-item"><a class="page-link" href='<?php echo "?pagina=$siguiente" ?>'>Siguiente</a></li>
                                    <?php endif; ?>
                                  </ul>
                                </nav>
                               
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
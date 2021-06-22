<!--admin.php es indexlogin.php-->
<!--video-->

<!--              -->

<?php 
    session_start(); 

          include '../../conexion/errores.php';
          include '../../conexion/validarfoto.php';
          include '../../conexion/database.php';
          require_once '../../conexion/config.php';
          spl_autoload_register( function($clase){
              require_once "../../conexion/$clase.php";
               });

    /*esto valida el usuario, sino existe, me manda a la pagina de iniciar sesion*/
    if( !$_SESSION['idUsuario'] && !$_SESSION['nombre'] ){
        header("Location: ../login.php");
        exit;
    }

    /*Para la fecha de usuarios*/
    $fecha = getdate();
    $diaN = date('d');
    $anio = date('Y');
    $meses = ["Enero", "Enero", "Febrero" ,"Marzo" ,"Abril" ,"Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
    $diaS = ["Domingo","Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"];
    $dia2 = $diaS[$fecha['wday']];
    $mes = $meses[$fecha['mon']=1];

    /*echo time()."<br>";*/


    


    $db = new database( DB_HOST, DB_USER, DB_PASS, DB_NAME );

    $sId = $_SESSION['idUsuario'];
    $db->preparar("SELECT nombre, imagen FROM usuario WHERE id_usuario = ? ");
    $db->prep()->bind_param( 'i', $sId); /*para añadir o agregar mas variables a la consulta que estamos haciendo*/
    $db->ejecutar();
    $db->prep()->bind_result( $uNombre, $uImagen); /*Para vincular el resultado*/
    $db->resultado();
    $db->liberar();

    /*CONTADOR Usuarios*/
    $db->preparar("SELECT COUNT(*) FROM usuario ");
    $db->ejecutar();
    $db->prep()->bind_result( $utotal); /*Para vincular el resultado*/
    $db->resultado();
    $db->liberar();
    /*CONTADOR Servicios*/
    $db->preparar("SELECT COUNT(*) FROM servicio ");
    $db->ejecutar();
    $db->prep()->bind_result( $stotal); /*Para vincular el resultado*/
    $db->resultado();
    $db->liberar();
    /*CONTADOR Usuario_Servicios*/
    $db->preparar("SELECT COUNT(*) FROM usuario_servicio ");
    $db->ejecutar();
    $db->prep()->bind_result( $ustotal); /*Para vincular el resultado*/
    $db->resultado();
    $db->liberar();
    /*CONTADOR Categorias*/
    $db->preparar("SELECT COUNT(*) FROM categoria ");
    $db->ejecutar();
    $db->prep()->bind_result( $ctotal); /*Para vincular el resultado*/
    $db->resultado();
    $db->liberar();
    
    
    /*VAMOS A USAR OTRA CONSULTA, DEL VIDEO 267*/  /*ESTO ES PARA MOSTRAR 5 RESULTADOS NADA MAS*/
                                       
    $db->preparar("SELECT COUNT(id_usuario) FROM usuario ");
    $db->ejecutar();
    $db->prep()->bind_result($contador);
    $db->resultado();
    $db->liberar();
    $porPagina = 5;
    $paginas =  ceil($contador/$porPagina);
    $pagina = (isset ($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
    $iniciar = ($pagina-1) * $porPagina;

    /*ESTA CONSULTA DE BASE DE DATOS, ME AHORRA HACER LAS VALIDACIONES PARA LAS PROVINCIAS, SEXO Y ROLES. OSEA ME PERMITE TRAER DIRECTAMENTE EL NOMBRE EN VEZ DE TRAER EL NUMERO Y TENER QUE VALIDAD A QUE PERTENECE CADA NUMERO*/

    $db->preparar("SELECT usuario.nombre, usuario.email, usuario.telefono, usuario.id_provincia, usuario.direccion, usuario.id_sexo, usuario.id_rol, usuario.fecha, sexo.nombre as sexin, provincia.nombre as provinciaName, rol.nombre as rolin FROM usuario INNER JOIN sexo ON usuario.id_sexo=sexo.id_sexo INNER JOIN provincia ON usuario.id_provincia=provincia.id_provincia INNER JOIN rol ON usuario.id_rol=rol.id_rol LIMIT $iniciar, $porPagina");
    $db->ejecutar();
    $db->prep()->bind_result( $dbnombre, $dbemail, $dbtelefono, $dbprovincia, $dbdireccion, $dbsexo, $dbrol, $dbfecha, $dbsexin, $dbprovincianame, $dbrolin);
    /*$db->resultado();*/


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ArServicios - Login</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/loginestilos.css">
    <link rel="stylesheet" href="../../conexion/estiloerror.css">
    <link rel="stylesheet" href="../../css/indexloginphp.css">
</head>
<body>
   <!--  NAVEGACION  -->
   
   <a class=" logo" href="../index.php">
        <span>Inicio</span> <i class="fas fa-home"></i>
        </a>  <!-- ME MANDA A index.php-->
   
   <nav class="" style="background-color: rgb(7, 4, 39);  height:50px;">
   <div >
        <div class="card-body px-lg-5 pt-0" style="text-align: right;">
        
        <a class="btn btn-primary" href="../editaruserpropio.php" style="margin-top:10px; padding:0;margin-right:40px;">Editar su Usuario <i class="fas fa-pencil-alt"></i> </a>  <!-- ME MANDA A editaruserpropio.php-->
        
        <a class="btn btn-primary" href="../cargaservicio.php" style="margin-top:10px; padding:0;margin-right:40px;">Cargar Servicio <i class="far fa-file-archive"></i> </a>  <!-- ME MANDA A cargaservicio.php-->
        
        <a class="btn btn-primary" href="../editarservicio.php" style="margin-top:10px; padding:0;margin-right:40px; ">Editar Servicios <i class="far fa-edit"></i> </a>  <!-- ME MANDA A editar.php-->
        
        <a class="btn btn-primary" href="../editar.php" style="margin-top:10px; padding:0;margin-right:40px; ">Editar Usuarios<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></a>  <!-- ME MANDA A editar.php-->
 <a class="btn btn-danger" href="../logout.php" style="margin-top:10px; padding:0;margin-right:-40px;">Cerrar Sesión <i class="fas fa-sign-out-alt"></i> </a>  <!-- ME MANDA A logout.php-->
      </div>
       <div class="card-body px-lg-5 pt-0" style="text-align: left;">
        
      </div>
    </div>
   </nav>
    <!--  NAVEGACION  -->

    
   <div class="izq">
       
        <!--va a mostrar la direccion de la imagen guardada, para ver eso linea 110 de registro.php. Como la direccion de este indexlogin.php esta en otra carpeta, le agrego un ../-->
          <img class=" img-responsive rounded-circle" src='<?php echo "../{$uImagen}"; ?>' alt="" style="display:block;
            margin:auto; width:180px; margin-top:15px;">
        <br>
       <center > 
        <!-- Material form login -->
        <div class="" style="padding: 0;border: 0;">

         <!--va a mostrar un cartel de bienvenida con el nombre que tiene en la base de datos-->
          <h5 class="">
            <strong>Usuario: <?php echo ucwords($uNombre); ?></strong>
            <br><br>
            <strong>Rol: <?php echo ucwords($_SESSION['rol']); ?> </strong> <!--Esto esta en iniciar.php-->
          </h5>
          
        <br>
        </div>
       </center>
   </div> 
   
    <div class="der">
        <img src="../../imagenes/logoAr.png" alt="Logo de ArServicios" style="display:block;
        margin:auto; width:180px; margin-top:-55px">
        <div class="cabecera-pagina">
            <h1 class="titulo-pagina"> 
                Administracion exclusiva para Administradores
                <small>Bienvenido a la administracion de ArServicios</small>
            </h1>
            
        </div>
        
        
        <div class="container-fluid">
           <div class="row">
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="panel">
                     <div class="icono bg-rojo">
                         <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                     </div>
                     <div class="valor">
                         <h1 class="cantidad"><?php echo $utotal; ?></h1>
                         <p>Usuarios Totales</p>
                     </div> 
                  </div>  
               </div>
               
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="panel">
                     <div class="icono bg-azul">
                         <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                     </div>
                     <div class="valor">
                         <h1 class="cantidad"><?php echo $stotal; ?></h1>
                         <p>Servicios Totales</p>
                     </div> 
                  </div>  
               </div>
               
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="panel">
                     <div class="icono bg-verde">
                         <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                     </div>
                     <div class="valor">
                         <h1 class="cantidad"><?php echo $ustotal; ?></h1>
                         <p>Usuarios con Servicios</p>
                     </div> 
                  </div>  
               </div>
               
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="panel">
                     <div class="icono bg-amarillo">
                         <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                     </div>
                     <div class="valor">
                         <h1 class="cantidad"><?php echo $ctotal; ?></h1>
                         <p>Categorias</p>
                     </div> 
                  </div>  
               </div>  
           </div>
           <div class="row">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="caja">
                           <div class="caja-cabecera">
                               <h1 style="font-size: 24px;">Ultimos usuarios registrados</h1>
                           </div>
                           <div class="caja-cuerpo">
                               <table class="table table-cell">
                                   <thead>
                                       <tr>
                                           <th>#</th>
                                           <th>Nombre</th>
                                           <th>Email</th>
                                           <th>Telefono</th>
                                           <th>Provincia</th>
                                           <th>Direccion</th>
                                           <th>Sexo</th>
                                           <th>Rol</th>
                                           <th>Fecha</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                      
                                      <?php
                                        
                                            $conteo=$iniciar; /*en editar.php linea 361 explico porque el iniciar. Pero basicamente es para que se vayan sumando los valores*/
                                                
                                            while( $db->resultado() ){ /*database.php*/
                                                $conteo++;
                                                echo "<tr>
                                                       <td>$conteo</td> 
                                                       <td>$dbnombre</td>
                                                       <td>$dbemail</td>
                                                       <td>$dbtelefono</td>
                                                       <td>$dbprovincianame</td>
                                                       <td>$dbdireccion</td>
                                                       <td>$dbsexin</td>
                                                       <td>$dbrolin</td>
                                                       <td>".date('d/m/Y',$dbfecha)."</td>
                                                      </tr>";
                                            }?>
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
       </div>
        
    </div>
       
       
        
       
       
       
    <!--script de jquery para que funcione el boton de inicio por ejemplo-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5db1674db6.js" crossorigin="anonymous"></script> <!--PARA EL LOGO DE CERRAR SESION-->
</body>
</html>
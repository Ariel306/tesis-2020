<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ArServicios - Software</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos_index.css">
    <link rel="stylesheet" href="../css/estilos_contacto.css">
</head>
<body>
   
   <!--      NAVEGACION      -->
   
   <?php include("../secciones_generales/nav.php"); ?>
    
    <!--      NAVEGACION     -->
     
    <!--      NAVEGACION SERVICIOS      -->
   
   <?php include("../secciones_generales/servicios.php"); ?>
    
    <!--      NAVEGACION SERVICIOS     -->
    
    <section>
        <div class="contacto">
            <h1>Software</h1>
        </div>
    </section>
    <br>
    
    
                        <!--SI APRETAMOS EL BOTON ver PASA ESTO-->

                               <?php if(isset($_GET['editar']) ) : ?>
                                <?php 

                                          include '../conexion/errores.php';
                                          include '../conexion/validarfoto.php';
                                          include '../conexion/database.php';
                                          require_once '../conexion/config.php';
                                          spl_autoload_register( function($clase){
                                              require_once "../conexion/$clase.php";
                                               });



                                    $db = new database( DB_HOST, DB_USER, DB_PASS, DB_NAME );




                                ?>


                               <center> 
                        <!-- Material form login -->
                        <div class="card col-md-6 col-center" style="padding: 0;border: 0;">

                          <h5 class="card-header info-color white-text text-center py-4" style="background-color: #e2db36;">
                            <strong>Editar Usuario</strong>
                          </h5>

                          <!--Card content-->
                          <div class="card-body px-lg-5 pt-0"> 

                               <div class="">
                                   <div class="col-centrar">

                                   <?php 
                                      

                                       $eID = $_GET['editar'];

                                     
                                        $db->preparar("SELECT nombre, id_categoria, direccion, maps, imagens FROM servicio WHERE id_servicio = ? ");
                                        $db->prep()->bind_param( 'i', $eID);
                                        $db->ejecutar();
                                        $db->prep()->bind_result($enombre, $ecategoria, $edireccion, $emaps, $eimagens);
                                        $db->resultado();
                                        $db->liberar();
                                       /*ESTOS DATOS SE VAN A MOSTRAR COMO BORROSOS*/
                                       ?>


                                   <!-- Form -->
                            <!--enctype="multipart/form-data" es para que acepte archivos multimedia-->  <!--ESTO VA A IR A ACTUALIZAR.PHP-->
                            <form class="text-center" enctype="multipart/form-data" method="post" style="color: #757575;" action="">
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
                                

                                <!--categoria-->
                              <div class="md-form">
                               <label for="">Categoria</label>
                                <input name="email" type="text" id="" class="form-control" placeholder="<?php echo "$ecategoria"; ?>">
                              </div>

                                <br>

                                <!--Direccion-->
                              <div class="md-form">
                               <label for="">Direccion</label>
                                <input name="telefono" type="number" id="" class="form-control" placeholder="<?php echo "$edireccion"; ?>">
                              </div>

                                <br>


                                <!--Maps-->
                              
                               <label for="">Maps</label>

                              
                                  <div class="md-form">
                                    <input name="id" type="hidden" id="" class="form-control" value="<?php echo "$eID"; ?>">
                                  </div>

                                <br>
                                
                                  <!--Imagen-->
                              <div class="md-form">
                               <label for="">Imagen</label>
                                <img class=" img-responsive" src='<?php echo "../index/$eimagens"; ?>' alt="" style="display:block;
            margin:auto; width:180px; margin-top:15px;">
                             
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

  
  
   
    
    <?php else : ?>
    
    
    
    
                            <div class='card-deck'>
                               
                                      <?php
                                       
                                       
                                          include '../conexion/errores.php';
                                          include '../conexion/validarfoto2.php';
                                          include '../conexion/database.php';
                                          require_once '../conexion/config.php';
                                          spl_autoload_register( function($clase){
                                              require_once "../conexion/$clase.php";
                                               });
                                       
                                       /*VAMOS A USAR OTRA CONSULTA, DEL VIDEO 267*/  /*ESTO ES PARA MOSTRAR 5 RESULTADOS NADA MAS*/
                                       $db = new database( DB_HOST, DB_USER, DB_PASS, DB_NAME );
                                       $db->preparar("SELECT COUNT(id_servicio) FROM servicio WHERE servicio.id_categoria=15 "); /*AGREGANDO EL WHERE servicio.id_categoria=15 LE DIGO QUE TRAIGA TODOS LOS SERVICIOS PERO CON ESE ID. sino hiciera esto, me va a traer todos los servicios y el contador va a mostrar mas resultados de los que hay. Para entender esto se puede eliminar WHERE servicio.id_categoria=15 y ver como el contador de paginas va a estar mal*/
                                       $db->ejecutar();
                                       $db->prep()->bind_result($contador);
                                       $db->resultado();
                                       $db->liberar();
                                       $porPagina = 10;
                                       $paginas =  ceil($contador/$porPagina);
                                       $pagina = (isset ($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
                                       $iniciar = ($pagina-1) * $porPagina;
            
                                       
                                       
                                       
                                       
                                        /*ESTA CONSULTA DE BASE DE DATOS, ME AHORRA HACER LAS VALIDACIONES PARA LAS PROVINCIAS, SEXO Y ROLES. OSEA ME PERMITE TRAER DIRECTAMENTE EL NOMBRE EN VEZ DE TRAER EL NUMERO Y TENER QUE VALIDAD A QUE PERTENECE CADA NUMERO*/

                                        $db->preparar("SELECT servicio.id_servicio, servicio.nombre, servicio.id_categoria, servicio.direccion, servicio.maps, servicio.imagens, categoria.nombre as categoriaName FROM servicio  INNER JOIN categoria ON servicio.id_categoria=categoria.id_categoria  WHERE servicio.id_categoria=15 LIMIT $iniciar, $porPagina"); /*Le agrego WHERE servicio.id_categoria=15 para que solo me traiga los servicios con ese id de categoria*/
                                        $db->ejecutar();
                                        $db->prep()->bind_result( $dbid, $dbnombre, $dbcategoria, $dbdireccion, $dbmaps, $dbimagens, $dbcategorianame);
                                        /*$db->resultado();*/

                                       /*ACA TUVE UN PROBLEMA Y ES QUE EL $dbid NO ME ENTREGABA NINGUN VALOR, ESTO ERA PORQUE NO DECLARE LA LLAMADA A LA BASE DE DATOS Y TAMPOCO LA VARIABLE, ENTONCES ME MANDABA 0 Y NO ME DEJABA EDITAR*/
                                            $conteo=$iniciar; /*final del video 267 explica porque le pongo $iniciar*/
                                               
                                       
                                       while( $db->resultado() ){
                                                $conteo++; 
                                           /*le asigno a probando el valor de conteo, cuando sea multiplo de 3*/
                                           $probando = $conteo;
                                            $probando= $probando / 3;
                                           
                                                echo "
                                                 
                                                 <div class='card col-4 '>
                                                    <img width='284' height='284' src='../index/$dbimagens' class='card-img-top' alt='Imagen de instituciones' >
                                                    <div class='card-body'>
                                                      <h5 class='card-title' style='text-align:center;'>$dbnombre</h5>
                                                      <p class='card-text'>Busca todas las empresas de Software de tu zona.</p>
                                                    </div>
                                                    <div class='card-body' style='text-align:center;'>
                                                      <a href='software.php?editar=$dbid' class='card-link' >Ver</a>
                                                      <a class='btn btn-success' href='software.php?editar=$dbid'>Ver</a>
                                                    </div>
                                                  </div>
                                                  
                                               
                                                ";
                                                  
                                           /*Esto es para saber si el numero es multiplo de 3, si llega a ser multiplo de 3 nos va a dar 0 y va a entrar al if, sino, no va a pasar nada. Hago esto para que se muestren de 3 en 3 servicios    https://www.adaweb.es/numeros-multiplos-en-php/       https://es.stackoverflow.com/questions/335891/multiplos-de-3-entre-2-y-20-php     */
                                                if ($conteo%3==0){
                                                  echo "<div class='w-100'></div> <br>";
                                                  }
                                                    
                                                    
                                                     
                                            }
                                        
                                            $db->liberar();
                                       ?>
                                       
                                        </div>  
                                          
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
                               
                           
    
    
    
     <?php endif; ?> 
    
    
    
    
    <!--
    
     
                                                <div class='card'>
                                                    <img src='../index/$dbimagens' class='card-img-top' alt='Imagen relacionada a los servicios de salud' >
                                                    <div class='card-body'>
                                                      <h5 class='card-title' style='text-align:center;'>$dbnombre</h5>
                                                      <p class='card-text'>Busca todos los hospitales de tu zona, salitas y farmacias que se encuentren disponible a tus horarios o consultas.</p>

                                                    </div>
                                                    <ul class='list-group list-group-flush'>
                                                      <li class='list-group-item' style='color:#ffffff;'><a href='../salud/hospitales.php' class='card-link'>Hospitales</a></li>
                                                      <li class='list-group-item' style='color:#ffffff;'><a href='../salud/salitas.php' class='card-link'>Salitas</a></li>
                                                      <li class='list-group-item' style='color:#ffffff;'><a href='../salud/farmacias.php' class='card-link'>Farmacias</a></li>
                                                    </ul>
                                                    <div class='card-body' style='text-align:center;'>
                                                      <a href='../servicios/salud.php' class='card-link' >Ir a Salud</a>
                                                    </div>
                                                  </div>
    
    
    
    
    
                                            $probando = $conteo;
                                                  $probando / 3;
                                           if ($probando==4){
                                                  echo "<div class='w-100'></div>";
                                                  }
    
    
    
    
    
    
                                                        <tr>
                                                       <td>$conteo</td> 
                                                       <td>$dbnombre</td>
                                                       <td>$dbcategorianame</td>
                                                       <td>$dbdireccion</td>
                                                       <td> <textarea cols='80' rows='1'>$dbmaps</textarea> 
                                                       </td>
                                                       <td>
                                                       <a class='btn btn-success' href='editarservicio.php?editarservicio=$dbid'><i class='fas fa-edit'></i></a>
                                                       <a class='btn btn-danger' href='editarservicio.php?confireliminarservicio=$dbid'><i class='fas fa-trash'></i></a>
                                                       </td>
                                                      </tr>
    
    
    
    
    
    
    
    
    
    -->
    
    
    
    
    
    
    
    
    
    
    <!--     FOOTER     -->
    
    <?php include("../secciones_generales/footer.php"); ?>
    
    <!-- Footer -->
 
     
  <!--script de jquery para que funcione el boton de inicio por ejemplo-->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5db1674db6.js" crossorigin="anonymous"></script> <!--PARA LOS LOGOS DE CERRAR SESION, pagina de https://fontawesome.com/ donde el juanpi me ayudo con los iconos-->
    
</body>
</html>
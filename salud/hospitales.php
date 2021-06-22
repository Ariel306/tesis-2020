<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ArServicios - Hospitales</title>
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
            <h1>Hospitales</h1>
        </div>
    </section>
    <br>
    <?php $mostrar= 3; ?>    
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

                                        $db->preparar("SELECT servicio.id_servicio, servicio.nombre, servicio.id_categoria, servicio.direccion, servicio.maps, servicio.imagens, categoria.nombre as categoriaName FROM servicio  INNER JOIN categoria ON servicio.id_categoria=categoria.id_categoria  WHERE servicio.id_categoria=1 LIMIT $iniciar, $porPagina"); /*Le agrego WHERE servicio.id_categoria=15 para que solo me traiga los servicios con ese id de categoria*/
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
                                                      <a href='../informatica/software.php' class='card-link' >Ir a Software</a>
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
                               
                           
    
    
    
    
    
    
    
    
    <!--     FOOTER     -->
    
    <?php include("../secciones_generales/footer.php"); ?>
    
    <!-- Footer -->
    

    
  
     
  <!--script de jquery para que funcione el boton de inicio por ejemplo-->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>
</html>
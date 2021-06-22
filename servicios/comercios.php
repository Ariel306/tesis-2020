<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ArServicios - Comercios</title>
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
            <h1>Comercios</h1>
        </div>
    </section>
    <br>
    
    <div class="card-deck">
     <!--  RAPIPAGO  -->
      <div class="card">
        <img src="../imagenes/servicios/comercios/rapipago.jpg" class="card-img-top" alt="Imagen relacionada a los servicios de salud" >
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">Rapipago</h5>
          <p class="card-text">Busca todos los Rapipago de tu zona.</p>
          
        </div>
        <div class="card-body" style="text-align:center;">
          <a href="../secciones_generales/mostrar2.php?id=10&nombre=Rapipago" class="card-link" >Ir a Rapipago</a>
        </div>
      </div>
      
      <!--  PAGOFACIL  -->
      <div class="card">
        <img src="../imagenes/servicios/comercios/pagofacil.png" class="card-img-top" alt="Imagen relacionada a los profesionales varios">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">Pagofacil</h5>
          <p class="card-text">Busca los Pagofacil de tu zona. </p>
          
        </div>
        <div class="card-body" style="text-align:center;">
          <a href="../secciones_generales/mostrar2.php?id=11&nombre=Pago Facil" >Ir a Pagofacil</a>
        </div>
      </div>
      
      <!--  CAMARA DE COMERCIO  -->
      <div class="card">
        <img src="../imagenes/servicios/comercios/camara%20de%20comercio.jpg" class="card-img-top" alt="Imagen de instituciones" >
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">Camara de Comercio</h5>
          <p class="card-text">Busca todas las Camara de Comercio de tu zona.</p>
        </div>
        <div class="card-body" style="text-align:center;">
          <a href="../secciones_generales/mostrar2.php?id=12&nombre=Camara de Comercio" class="card-link" >Ir a Camara de Comercio</a>
        </div>
      </div>
    </div>
    
    
    
    <!--     FOOTER     -->
    
    <?php include("../secciones_generales/footer.php"); ?>
    
    <!-- Footer -->
    

    
  
     
  <!--script de jquery para que funcione el boton de inicio por ejemplo-->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>
</html>
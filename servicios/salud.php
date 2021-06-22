<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ArServicios - Salud</title>
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
            <h1>Salud</h1>
        </div>
    </section>
    <br>
    <div class="card-deck">
    
  
     <!--  HOSPITALES  -->
      <div class="card">
        <img width='284' height='284' src="../imagenes/servicios/salud/hospitales.png" class="card-img-top" alt="Imagen relacionada a los servicios de salud" >
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">Hospitales</h5>
          <p class="card-text">Busca todos los hospitales de tu zona.</p>
          
        </div>
        <div class="card-body" style="text-align:center;">
          <a href="../secciones_generales/mostrar2.php?id=1&nombre=Hospitales" class="card-link" >Ir a Hospitales</a>
        </div>
      </div>
      
      <!--  SALITAS  -->
      <div class="card">
        <img width='284' height='284' src="../imagenes/servicios/salud/salitas.jpg" class="card-img-top" alt="Imagen relacionada a los profesionales varios">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">Salitas</h5>
          <p class="card-text">Busca los centros de salud de tu zona. </p>
          
        </div>
        <div class="card-body" style="text-align:center;">
          <a href="../secciones_generales/mostrar2.php?id=2&nombre=Salitas" class="card-link" >Ir a Salitas</a>
        </div>
      </div>
      
      <!--  FARMACIAS  -->
      <div class="card">
        <img width='284' height='284' src="../imagenes/servicios/salud/farmacias.jpg" class="card-img-top" alt="Imagen de instituciones" >
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">Farmacias</h5>
          <p class="card-text">Busca todas las farmacias de tu zona.</p>
        </div>
        <div class="card-body" style="text-align:center;">
          <a href="../secciones_generales/mostrar2.php?id=3&nombre=Farmacias" class="card-link" >Ir a Farmacias</a>
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
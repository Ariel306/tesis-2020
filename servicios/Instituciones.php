<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ArServicios - Instituciones</title>
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
            <h1>Instituciones</h1>
        </div>
    </section>
    <br>
   
    <div class="card-deck">
     <!--  Escuelas Publicas  -->
      <div class="card">
        <img width='284' height='284' src="../imagenes/servicios/instituciones/escuelas%20publicas.jpg" class="card-img-top" alt="Imagen relacionada a los servicios de salud" >
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">Escuelas Publicas</h5>
          <p class="card-text">Busca las Escuelas Publicas de tu zona.</p>
          
        </div>
        <div class="card-body" style="text-align:center;">
          <a href="../secciones_generales/mostrar2.php?id=7&nombre=Escuelas Publicas" class="card-link" >Ir a Escuelas Publicas</a>
        </div>
      </div>
      
      <!--  Escuelas Privadas  -->
      <div class="card">
        <img width='284' height='284' src="../imagenes/servicios/instituciones/escuelas%20privadas.jpg" class="card-img-top" alt="Imagen relacionada a los profesionales varios">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">Escuelas Privadas</h5>
          <p class="card-text">Busca las Escuelas Privadas de tu zona. </p>
          
        </div>
        <div class="card-body" style="text-align:center;">
          <a href="../secciones_generales/mostrar2.php?id=8&nombre=Escuelas Privadas" class="card-link" >Ir a Escuelas Privadas</a>
        </div>
      </div>
      
      <!--  Institutos  -->
      <div class="card">
        <img width='284' height='284' src="../imagenes/servicios/instituciones/institutos.jpg" class="card-img-top" alt="Imagen de instituciones" >
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">Institutos</h5>
          <p class="card-text">Busca todos los Institutos de tu zona.</p>
        </div>
        <div class="card-body" style="text-align:center;">
          <a href="../secciones_generales/mostrar2.php?id=9&nombre=Institutos" class="card-link" >Ir a Institutos</a>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ArServicios - Inicio</title>
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
            <h1>Inicio</h1>
        </div>
    </section>
    <br>
        
    <div class="card-deck">
     <!--  SALUD  -->
      <div class="card">
        <img width='284' height='284' src="../imagenes/servicios/salud/salud.jpg" class="card-img-top" alt="Imagen relacionada a los servicios de salud" >
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">Salud</h5>
          <p class="card-text">Busca todos los hospitales de tu zona, salitas y farmacias que se encuentren disponible a tus horarios o consultas.</p>
          
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item" style="color:#ffffff;"><a href="../secciones_generales/mostrar2.php?id=1&nombre=Hospitales" class="card-link">Hospitales</a></li>
          <li class="list-group-item" style="color:#ffffff;"><a href="../secciones_generales/mostrar2.php?id=2&nombre=Salitas" class="card-link">Salitas</a></li>
          <li class="list-group-item" style="color:#ffffff;"><a href="../secciones_generales/mostrar2.php?id=3&nombre=Farmacias" class="card-link">Farmacias</a></li>
        </ul>
        <div class="card-body" style="text-align:center;">
          <a href="../servicios/salud.php" class="card-link" >Ir a Salud</a>
        </div>
      </div>
      
      <!--  PROFESIONALES VARIOS  -->
      <div class="card">
        <img width='284' height='284' src="../imagenes/servicios/profesionales/profesionales.jpg" class="card-img-top" alt="Imagen relacionada a los profesionales varios">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">Profesionales Varios</h5>
          <p class="card-text">Busca diferentes profesionales para tus necesidades, donde podras obtener su informacion y demas. </p>
          
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><a href="../secciones_generales/mostrar2.php?id=4&nombre=Cerrajeros" class="card-link">Cerrajeros</a></li>
          <li class="list-group-item"><a href="../secciones_generales/mostrar2.php?id=5&nombre=Carpinteros" class="card-link">Carpinteros</a></li>
          <li class="list-group-item"><a href="../secciones_generales/mostrar2.php?id=6&nombre=Albañiles" class="card-link">Albañiles</a></li>
        </ul>
        <div class="card-body" style="text-align:center;">
          <a href="../servicios/profesionales.php" class="card-link" >Ir a Profesionales Varios</a>
        </div>
      </div>
      
      <!--  INSTITUCIONES  -->
      <div class="card">
        <img width='284' height='284' src="../imagenes/servicios/instituciones/instituciones.png" class="card-img-top" alt="Imagen de instituciones" >
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">Instituciones</h5>
          <p class="card-text">Busca todas las instituciones que se encuentren en tu zona.</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><a href="../secciones_generales/mostrar2.php?id=7&nombre=Escuelas Publicas" class="card-link">Escuelas Publicas</a></li>
          <li class="list-group-item"><a href="../secciones_generales/mostrar2.php?id=8&nombre=Escuelas Privadas" class="card-link">Escuelas Privadas</a></li>
          <li class="list-group-item"><a href="../secciones_generales/mostrar2.php?id=9&nombre=Institutos" class="card-link">Institutos</a></li>
        </ul>
        <div class="card-body" style="text-align:center;">
          <a href="../servicios/Instituciones.php" class="card-link" >Ir a Instituciones</a>
        </div>
      </div>
    </div>
    
    <br>
    
    <div class="card-deck">
     <!--  COMERCIOS  -->
      <div class="card">
        <img width='284' height='284' src="../imagenes/servicios/comercios/comercio.jpg" class="card-img-top" alt="Imagen relacionada a los servicios de salud">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">Comercios</h5>
          <p class="card-text">Busca todos los comercios de tu zona, su disponibilidad horaria y informacion.</p>
          
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item" style="color:#ffffff;"><a href="../secciones_generales/mostrar2.php?id=10&nombre=Rapipago" class="card-link">Rapipago</a></li>
          <li class="list-group-item" style="color:#ffffff;"><a href="../secciones_generales/mostrar2.php?id=11&nombre=Pago Facil" class="card-link">Pago Facil</a></li>
          <li class="list-group-item" style="color:#ffffff;"><a href="../secciones_generales/mostrar2.php?id=12&nombre=Camara de Comercio" class="card-link">Camara de Comercio</a></li>
        </ul>
        <div class="card-body" style="text-align:center;">
          <a href="../servicios/comercios.php" class="card-link" >Ir a Comercios</a>
        </div>
      </div>
      
      <!--  INFORMATICA  -->
      <div class="card">
        <img width='284' height='284' src="../imagenes/servicios/informatica/informatica.jpg" class="card-img-top" alt="Imagen relacionada a los profesionales varios">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">Informatica</h5>
          <p class="card-text">Busca todo lo relacionado a la informática y elige la mejor opción. </p>
          
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><a href="../secciones_generales/mostrar2.php?id=13&nombre=Reparacion de Computadoras" class="card-link">Reparacion de Computadoras</a></li>
          <li class="list-group-item"><a href="../secciones_generales/mostrar2.php?id=14&nombre=Venta de insumos" class="card-link">Venta de insumos</a></li>
          <li class="list-group-item"><a href="../secciones_generales/mostrar2.php?id=15&nombre=Software" class="card-link">Software</a></li>
        </ul>
        <div class="card-body" style="text-align:center;">
          <a href="../servicios/informatica.php" class="card-link" >Ir a Informatica</a>
        </div>
      </div>
      
      <!--  TURISMO  -->
      <div class="card">
        <img width='284' height='284' src="../imagenes/servicios/turismo/turismo.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">Turismo</h5>
          <p class="card-text">Busca lugares para visitar y déjate escapar.</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><a href="../secciones_generales/mostrar2.php?id=16&nombre=Senderismo" class="card-link">Senderismo</a></li>
          <li class="list-group-item"><a href="../secciones_generales/mostrar2.php?id=17&nombre=Cabañas/Hoteles" class="card-link">Cabañas/Hoteles</a></li>
          <li class="list-group-item"><a href="../secciones_generales/mostrar2.php?id=18&nombre=Diques" class="card-link">Diques</a></li>
        </ul>
        <div class="card-body" style="text-align:center;">
          <a href="../servicios/turismo.php" class="card-link" >Ir a Turismo</a>
        </div>
      </div>
      
    </div>
    
    <br>
    
    <div class="card-deck" style="border:0px solid;">
     <!--  ALQUILERES/VENTAS  -->
      <div class="card">
        <img width='284' height='284' src="../imagenes/servicios/alquileres-ventas/alquileres.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Alquileres/Ventas</h5>
        <p class="card-text">Busca tu futuro hogar.</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="../secciones_generales/mostrar2.php?id=19&nombre=Alquileres" class="card-link">Alquileres</a></li>
          <li class="list-group-item"><a href="../secciones_generales/mostrar2.php?id=20&nombre=Ventas" class="card-link">Ventas</a></li>
      </ul>
      <div class="card-body" style="text-align:center;">
          <a href="../servicios/alquiler_venta.php" class="card-link" >Ir a Alquileres y Ventas</a>
        </div>
      </div>
      
      <!--  HAGO ESTO PARA QUE EL SERVICIOS DE  Alquileres/Ventas ESTE IGUAL QUE LOS DEMAS, AL AGREGAR ESTAS 2 COLUMNAS MAS QUEDARIA ASI -->
      <div class="card" style="border:0px solid;">
      </div>
      
      <!--    -->
      <div class="card" style="border:0px solid;">    
      </div>
      
    </div>
     

    
    
    
    
    
    
    <!--     FOOTER     -->
    
    <?php include("../secciones_generales/footer.php"); ?>
    
    <!-- Footer -->
    

    
  
     
  <!--script de jquery para que funcione el boton de inicio por ejemplo-->  <!--video 261 vemos un poco de esto-->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
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
        <img src="../imagenes/servicios/salud/salud.jpg" class="card-img-top" alt="Imagen relacionada a los servicios de salud" >
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">Salud</h5>
          <p class="card-text">Busca todos los hospitales de tu zona, salitas y farmacias que se encuentren disponible a tus horarios o consultas.</p>
          
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item" style="color:#ffffff;"><a href="../salud/hospitales.php" class="card-link">Hospitales</a></li>
          <li class="list-group-item" style="color:#ffffff;"><a href="../salud/salitas.php" class="card-link">Salitas</a></li>
          <li class="list-group-item" style="color:#ffffff;"><a href="../salud/farmacias.php" class="card-link">Farmacias</a></li>
        </ul>
        <div class="card-body" style="text-align:center;">
          <a href="../servicios/salud.php" class="card-link" >Ir a Salud</a>
        </div>
      </div>
      
      <!--  PROFESIONALES VARIOS  -->
      <div class="card">
        <img src="../imagenes/servicios/profesionales/profesionales.jpg" class="card-img-top" alt="Imagen relacionada a los profesionales varios">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">Profesionales Varios</h5>
          <p class="card-text">Busca diferentes profesionales para tus necesidades, donde podras obtener su informacion y demas. </p>
          
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><a href="../profesionales/cerrajeros.php" class="card-link">Cerrajeros</a></li>
          <li class="list-group-item"><a href="../profesionales/carpinteros.php" class="card-link">Carpinteros</a></li>
          <li class="list-group-item"><a href="../profesionales/alba%C3%B1iles.php" class="card-link">Albañiles</a></li>
        </ul>
        <div class="card-body" style="text-align:center;">
          <a href="../servicios/profesionales.php" class="card-link" >Ir a Profesionales Varios</a>
        </div>
      </div>
      
      <!--  INSTITUCIONES  -->
      <div class="card">
        <img src="../imagenes/servicios/instituciones/instituciones.png" class="card-img-top" alt="Imagen de instituciones" >
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">Instituciones</h5>
          <p class="card-text">Busca todas las instituciones que se encuentren en tu zona.</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><a href="../instituciones/escuelaspublicas.php" class="card-link">Escuelas Publicas</a></li>
          <li class="list-group-item"><a href="../instituciones/escuelasprivadas.php" class="card-link">Escuelas Privadas</a></li>
          <li class="list-group-item"><a href="../instituciones/institutos.php" class="card-link">Institutos</a></li>
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
        <img src="../imagenes/servicios/comercios/comercio.jpg" class="card-img-top" alt="Imagen relacionada a los servicios de salud">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">Comercios</h5>
          <p class="card-text">Busca todos los comercios de tu zona, su disponibilidad horaria y informacion.</p>
          
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item" style="color:#ffffff;"><a href="../comercios/rapipago.php" class="card-link">Rapipago</a></li>
          <li class="list-group-item" style="color:#ffffff;"><a href="../comercios/pagofacil.php" class="card-link">Pago Facil</a></li>
          <li class="list-group-item" style="color:#ffffff;"><a href="../comercios/camaracomercio.php" class="card-link">Camara de Comercio</a></li>
        </ul>
        <div class="card-body" style="text-align:center;">
          <a href="../servicios/comercios.php" class="card-link" >Ir a Comercios</a>
        </div>
      </div>
      
      <!--  INFORMATICA  -->
      <div class="card">
        <img src="../imagenes/servicios/informatica/informatica.jpg" class="card-img-top" alt="Imagen relacionada a los profesionales varios">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">Informatica</h5>
          <p class="card-text">Busca todo lo relacionado a la informática y elige la mejor opción. </p>
          
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><a href="../informatica/reparacioncomputadoras.php" class="card-link">Reparacion de Computadoras</a></li>
          <li class="list-group-item"><a href="../informatica/ventainsumos.php" class="card-link">Venta de insumos</a></li>
          <li class="list-group-item"><a href="../informatica/software.php" class="card-link">Software</a></li>
        </ul>
        <div class="card-body" style="text-align:center;">
          <a href="../servicios/informatica.php" class="card-link" >Ir a Informatica</a>
        </div>
      </div>
      
      <!--  TURISMO  -->
      <div class="card">
        <img src="../imagenes/servicios/turismo/turismo.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">Turismo</h5>
          <p class="card-text">Busca lugares para visitar y déjate escapar.</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><a href="../turismo/senderismo.php" class="card-link">Senderismo</a></li>
          <li class="list-group-item"><a href="../turismo/caba%C3%B1ashoteles.php" class="card-link">Cabañas/Hoteles</a></li>
          <li class="list-group-item"><a href="../turismo/diques.php" class="card-link">Diques</a></li>
        </ul>
        <div class="card-body" style="text-align:center;">
          <a href="../servicios/turismo.php" class="card-link" >Ir a Turismo</a>
        </div>
      </div>
      
    </div>
    
    <br>
    
     <!--  ALQUILERES/VENTAS  -->
    <div class="card" style="width: 27rem;">
      <img src="../imagenes/servicios/alquileres-ventas/alquileres.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Alquileres/Ventas</h5>
        <p class="card-text">Busca tu futuro hogar.</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="../alquileres-ventas/alquileres.php" class="card-link">Alquileres</a></li>
          <li class="list-group-item"><a href="../alquileres-ventas/ventas.php" class="card-link">Ventas</a></li>
      </ul>
      <div class="card-body" style="text-align:center;">
          <a href="../servicios/alquiler_venta.php" class="card-link" >Ir a Alquileres y Ventas</a>
        </div>
    </div>

    
    
    
    
    
    
    <!--     FOOTER     -->
    
    <?php include("../secciones_generales/footer.php"); ?>
    
    <!-- Footer -->
    
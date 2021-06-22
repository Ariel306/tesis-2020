 <?php
function validarFoto( $nombre, $update = false ){
    
    /*ESTE IF SE AGREGO EN EL VIDEO 265 y 266*/
    if($update){
        
        borrarCarpetas("fotos/$nombre");
        
        /*$dir = "fotos/$nombre";
        $gestor = opendir($dir);
        
        while( false != ($archivo = readdir($gestor))) {
            if( $archivo != '.' && $archivo != '..' && $archivo != 'Thumbs.db'){
                unlink("$dir/$archivo");
            }
        }
        closedir($gestor);
        sleep(1);*/
    }
    
    
    
    global $dirSubida;
    global $rutaSubida;
    global $error;
    
    $dirSubida = "fotos/$nombre/";
                             
     $foto = $_FILES['foto']; /*aca tiene que venir el name que tiene el type="file" cuando cargamos la foto*/
              
     $nombreFoto = $foto['name'];
     $nombreTmp = $foto['tmp_name'];
     $rutaSubida = "{$dirSubida}profile.jpg";
     $extArchivo = preg_replace('/image\//', '', $foto['type'] );
              
     /*COMPRUEBA QUE LA IMAGEN SEA JPEG O PNG*/
     if( $extArchivo == 'jpeg' || $extArchivo == 'png'){
         /*Si la imagen es jpeg o png crea la carpeta con el nombre del usuario*/
         if(!file_exists($dirSubida)){
            mkdir($dirSubida, 0777);
         }
         
         if( move_uploaded_file( $nombreTmp, $rutaSubida)){
             return true;
         } else{
             trigger_error("No se pudo mover el archivo, intente de nuevo", E_USER_ERROR);
         }
     }else {
         trigger_error("No es un archivo de imagen valido", E_USER_ERROR);
     }
     return $error; 
    
} 

/*CREADO PARA BORRAR LA CARPETA CUANDO BORRAMOS EL USUARIO, VIDEO 266*/
function borrarCarpetas($dir){
    $gestor=opendir($dir);
    while( false != ($archivo = readdir($gestor))) {
        if( $archivo != '.' && $archivo != '..'){
            if(!unlink("$dir/$archivo")){
                borrarCarpetas ("$dir/$archivo");
            }
             
        }
    }
        closedir($gestor);
        rmdir($dir);
        sleep(1);
}
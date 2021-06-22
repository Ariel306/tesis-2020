<!--  https://www.youtube.com/watch?v=RSlE38lvlys  -->
<!--  https://github.com/PHPMailer/PHPMailer  -->

   <!--codigo para enviar el correo -->
    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    /*llamamos a las librerias*/
    require '../formulario_consulta/Exception.php';
    require '../formulario_consulta/PHPMailer.php';
    require '../formulario_consulta/SMTP.php';

    $mail = new PHPMailer(true);

        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.live.com';                        // Servidor hotmail en smtp
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'ariellopez_306@hotmail.com';                     // SMTP username
        $mail->Password   = 'arnolsuarsenegro';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('ariellopez_306@hotmail.com', 'ArServicios');     //Dende donde se va a enviar
        $mail->addAddress('ariellopez_306@hotmail.com', 'Administrador');     // A donde se va a enviar

        $name = $_POST['name'];
        $email = $_POST['email'];
        $seleccion = $_POST['seleccion'];
        $mensaje = $_POST['mensaje'];
        


        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Consulta ArServicios';
        $mail->Body    = "Consulta de la paguina ArServicios: <br><br> Nombre: $name <br> Email: $email <br> Selecccion: $seleccion <br> Message: $mensaje ";



        $mail->send();
        /*Se puede enviar de estas 2 formas, lo unico es que la segunda forma me va a mandar una alerta por pantalla de que se mando el mensaje*/
        
       /* header ("Location:../index/contacto.php");*/
        echo"<script type=\"text/javascript\">alert('Su mensaje ha sido enviado correctamente'); window.location='../index/contacto.php';</script>";
    ?>


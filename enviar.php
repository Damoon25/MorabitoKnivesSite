<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Validación del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura de los datos del formulario
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : "";
    $apellido = isset($_POST['apellido']) ? trim($_POST['apellido']) : "";
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : "";
    $asunto = isset($_POST['asunto']) ? trim($_POST['asunto']) : "";

    // Validación adicional
    if (empty($nombre) || empty($apellido) || empty($email) || empty($mensaje) || empty($asunto)) {
        header('location: mensaje_error.php?error=missing_fields');
        exit;
    }

    // Validación de correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('location: mensaje_error.php?error=invalid_email');
        exit;
    }

    // Cuerpo del correo electrónico
    $body = <<< HTML
            <p><strong>Nombre: </strong> $nombre</p>
            <p><strong>Apellido: </strong> $apellido</p>
            <p><strong>E-Mail: </strong> $email</p>
            <p><strong>Mensaje:</strong> $mensaje</p>
            HTML;

    // Enviar correo con PHPMailer
    require 'vendor/autoload.php';

    $mail = new PHPMailer(true); // Habilitar excepciones
    $mail->SMTPDebug = 2; // Habilitar depuración

    try {
        // Configuración del servidor SMTP y las credenciales
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        $mail->SMTPAuth = true;
        $mail->Username = 'contacto@morabitoknives.com.ar'; // Tu dirección de correo electrónico
        $mail->Password = 'contactoMK2505#'; // Tu contraseña de correo electrónico

        // Configurar el correo
        $mail->setFrom('contacto@morabitoknives.com.ar'); // Tu dirección de correo electrónico
        $mail->addReplyTo($email, $nombre); // Utiliza el correo electrónico del remitente del formulario como la dirección de respuesta
        $mail->addAddress('info@morabitoknives.com.ar', ''); // Dirección de correo electrónico de destino
        $mail->IsHTML(true);
        $mail->Subject = $asunto;
        $mail->Body = $body;

        // Enviar correo
        $mail->send();
        header('location: mensaje.php');
        exit;
    } catch (Exception $e) {
        // Manejar errores
        header('location: mensaje_error.php?error=email_send_error&message=' . urlencode($e->getMessage()));
        exit;
    }
} else {
    // Si no es una solicitud POST, redirige con un mensaje de error
    header('location: mensaje_error.php?error=invalid_request_method');
    exit;
}

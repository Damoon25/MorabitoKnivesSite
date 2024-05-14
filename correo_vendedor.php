<?php

// Enviar correo con PHPMailer
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Validación del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura de los datos del formulario
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : "";
    $producto = isset($_POST['producto']) ? trim($_POST['producto']) : "";
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $cantidad = isset($_POST['cantidad']) ? trim($_POST['cantidad']) : "";
    $precio = isset($_POST['precio']) ? trim($_POST['precio']) : "";
    $direccion = isset($_POST['direccion']) ? trim($_POST['direccion']) : "";
    $cp = isset($_POST['cp']) ? trim($_POST['cp']) : "";

    // Validación adicional
    if (
        empty($nombre) || empty($producto) || empty($cantidad) || empty($precio) ||
        empty($direccion) || empty($email) || empty($cp)
    ) {
        header('location: mensaje_error.php?error=missing_fields');
        exit;
    }

    // Validación de correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('location: mensaje_error.php?error=invalid_email');
        exit;
    }

    // Cuerpo del correo electrónico
    $body = <<<HTML
                <div class="container">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h2 class="mb-0">Detalles de la compra:</h2>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Nombre:</strong> $nombre</p>
                                    <p><strong>Producto:</strong> $producto</p>
                                    <p><strong>Correo electrónico:</strong> $email</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Cantidad:</strong> $cantidad</p>
                                    <p><strong>Precio:</strong> $precio</p>
                                    <p><strong>Dirección de envío:</strong> $direccion</p>
                                    <p><strong>Código Postal:</strong> $cp</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            HTML;

    try {
        // Configuración del servidor SMTP y las credenciales
        $mailVendedor = new PHPMailer(true); // Habilitar excepciones
        $mailVendedor->SMTPDebug = 2; // Habilitar depuración
        $mailVendedor->isSMTP();
        $mailVendedor->Host = 'smtp.hostinger.com';
        $mailVendedor->SMTPSecure = 'tls';
        $mailVendedor->Port = 587;
        $mailVendedor->CharSet = 'UTF-8';
        $mailVendedor->SMTPAuth = true;
        $mailVendedor->Username = 'noresponder@morabitoknives.com.ar'; // Tu dirección de correo electrónico
        $mailVendedor->Password = 'noresponderMK2505#'; // Tu contraseña de correo electrónico

        $mailVendedor->setFrom('noresponder@morabitoknives.com.ar'); // Tu dirección de correo electrónico
        $mailVendedor->addAddress('damoonart6@gmail.com'); // Dirección de correo electrónico de destino
        $mailVendedor->IsHTML(true);
        $mailVendedor->Subject = "Nueva compra realizada";
        $mailVendedor->Body = $body;

        // Enviar correo
        $mailVendedor->send();
        echo "El correo electrónico ha sido enviado al vendedor.";
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

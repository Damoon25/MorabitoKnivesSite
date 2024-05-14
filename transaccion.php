<?php

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$cantidad = $_POST['cantidad'];
$producto = $_POST['producto'];
$precio = $_POST['precio'];
$direccion = $_POST['direccion'];
$cp = $_POST['cp'];
$fecha = new DateTime();
$nuevaFecha = $fecha->format('d/m/Y g:i A');

include("administrador/config/conexion.php");
$sql = $conexion->prepare("INSERT INTO pago (nombre, email, cantidad, producto, precio, direccion, fecha) 
                            VALUES (:nombre, :email, :cantidad, :producto, :precio, :direccion, :fecha);");
$sql->bindParam(':nombre', $nombre);
$sql->bindParam(':email', $email);
$sql->bindParam(':cantidad', $cantidad);
$sql->bindParam(':producto', $producto);
$sql->bindParam(':precio', $precio);
$sql->bindParam(':direccion', $direccion);
$sql->bindParam(':fecha', $fecha);

if ($sql->execute()) {
    echo "<script>console.log('Los datos se insertaron correctamente en la base de datos.');</script>";
} else {
    echo "<script>console.error('Error al insertar los datos en la base de datos.');</script>";
}

<?php
$conexion = new mysqli("localhost", "root", "", "reservaciones");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
$nombre = $_POST['nombre'];
$servicio = $_POST['servicio'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

$sql = "INSERT INTO citas (nombre, servicio, fecha, hora)
        VALUES ('$nombre', '$servicio', '$fecha', '$hora')";

if ($conexion->query($sql) === TRUE) {
    echo "Reservación guardada correctamente.<br><a href='index.html'>Volver</a>";
} else {
    echo "Error al guardar: " . $conexion->error;}
$conexion->close();
?>
<?php
$conexion = new mysqli("localhost", "root", "", "reservaciones");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$servicio = $_POST['servicio'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

$sql = "UPDATE citas SET nombre='$nombre', servicio='$servicio', fecha='$fecha', hora='$hora' WHERE id=$id";

if ($conexion->query($sql) === TRUE) {
    echo "Reservación actualizada.<br><a href='show.php'>Volver</a>";
} else {
    echo "Error al actualizar: " . $conexion->error;
}

$conexion->close();
?>
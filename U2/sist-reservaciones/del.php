<?php
$conexion = new mysqli("localhost", "root", "", "reservaciones");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$id = $_GET['id'];
$sql = "DELETE FROM citas WHERE id=$id";

if ($conexion->query($sql) === TRUE) {
    echo "La reservación ha sido eliminada.<br><a href='show.php'>Volver</a>";
} else {
    echo "Error al eliminar: " . $conexion->error;
}

$conexion->close();
?>
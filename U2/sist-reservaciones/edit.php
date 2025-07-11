<?php
$conexion = new mysqli("localhost", "root", "", "reservaciones");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM citas WHERE id=$id";
$resultado = $conexion->query($sql);
$fila = $resultado->fetch_assoc();
?>

<h2>Editar Reservación</h2>
<form action="act.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
    
    <label>NOMBRE:</label><br>
    <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>" required><br><br>

    <label>SERVICIO:</label><br>
    <input type="text" name="servicio" value="<?php echo $fila['servicio']; ?>" required><br><br>

    <label>FECHA:</label><br>
    <input type="date" name="fecha" value="<?php echo $fila['fecha']; ?>" required><br><br>

    <label>GORA:</label><br>
    <input type="time" name="hora" value="<?php echo $fila['hora']; ?>" required><br><br>

    <input type="submit" value="Actualizar">
</form>
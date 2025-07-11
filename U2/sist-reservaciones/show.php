<?php
$conexion = new mysqli("localhost", "root", "", "reservaciones");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$resultado = $conexion->query("SELECT * FROM citas");

echo "<h2>Reservaciones</h2>";
echo "<table border='1' cellpadding='8'>
<tr><th>ID</th><th>Nombre</th><th>Servicio</th><th>Fecha</th><th>Hora</th><th>Acciones</th></tr>";

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>
        <td>{$fila['id']}</td>
        <td>{$fila['nombre']}</td>
        <td>{$fila['servicio']}</td>
        <td>{$fila['fecha']}</td>
        <td>{$fila['hora']}</td>
        <td>
            <a href='edit.php?id={$fila['id']}'>Editar</a> | 
            <a href='del.php?id={$fila['id']}'>Eliminar</a>
        </td>
    </tr>";
}

echo "</table><br><a href='index.html'>Registrar nueva reservación</a>";
$conexion->close();
?>
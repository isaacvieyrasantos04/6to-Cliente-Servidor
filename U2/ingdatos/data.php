<?php
$conn = new mysqli("localhost", "root", "", "formulario");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_GET['eliminar'])) {
    $idEliminar = intval($_GET['eliminar']);
    $conn->query("DELETE FROM personas WHERE id = $idEliminar");
    echo "<p style='color:red;'>Registro eliminado correctamente.</p>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo_electronico'];
    $telefono = $_POST['telefono'];
    $fecha_nac = $_POST['fecha_nacimiento'];
    $curp = $_POST['curp'];
    $rfc = $_POST['rfc'];
    $genero = $_POST['genero'];
    $pais = $_POST['pais'];

    $sql = "INSERT INTO personas (nombre, apellido, correo_electronico, telefono, fecha_nacimiento, curp, rfc, genero, pais)
            VALUES ('$nombre', '$apellido', '$correo', '$telefono', '$fecha_nac', '$curp', '$rfc', '$genero', '$pais')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Registro guardado exitosamente.</p>";
    } else {
        echo "<p style='color:red;'>Error al guardar: " . $conn->error . "</p>";
    }
}

$result = $conn->query("SELECT * FROM personas");

echo "<h2>Registros guardados</h2>";

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='5'>
            <tr style='background-color:#f2f2f2;'>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Fecha Nac.</th>
                <th>CURP</th>
                <th>RFC</th>
                <th>Género</th>
                <th>País</th>
                <th>Acción</th>
            </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['apellido']}</td>
                <td>{$row['correo_electronico']}</td>
                <td>{$row['telefono']}</td>
                <td>{$row['fecha_nacimiento']}</td>
                <td>{$row['curp']}</td>
                <td>{$row['rfc']}</td>
                <td>{$row['genero']}</td>
                <td>{$row['pais']}</td>
                <td><a href='data.php?eliminar={$row['id']}' onclick=\"return confirm('¿Eliminar este registro?');\">Eliminar</a></td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No hay registros aún.</p>";
}

echo "<br><a href='index.html'>← Volver al formulario</a>";

$conn->close();
?>
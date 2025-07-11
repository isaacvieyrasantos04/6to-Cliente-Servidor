<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$db = "sistema";

$conexion = new MySQLi($servidor, $usuario, $clave, $db);

if ($conexion) {
    echo "CONECTION SUCCESFUL";
}

$conexion->close();
?>
<?php
$servidor = "localhost";
$usuari = "tu_usuario";
$contrasenya = "tu_password";
$bd = "tu_base_de_datos";

$conn = new mysqli($servidor, $usuari, $contrasenya, $bd);

if ($conn->connect_error) {
    die("Error de connexió: " . $conn->connect_error);
}
?>
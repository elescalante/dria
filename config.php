<?php
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contrasena";
$database = "mi_doctor";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
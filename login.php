<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($contrasena, $usuario["contrasena"])) {
            $_SESSION["usuario"] = $usuario["correo"];
            header("Location: dashboard.php");
            exit();
        }
    }
    echo "Credenciales inválidas";
}
?>
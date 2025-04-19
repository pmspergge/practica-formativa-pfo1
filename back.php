<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : "";
    $contrasena = isset($_POST["contraseña"]) ? trim($_POST["contraseña"]) : "";

    if (empty($usuario) || empty($contrasena)) {
        echo json_encode([
            "status" => "error",
            "message" => "Usuario o contraseña vacíos."
        ]);
        exit;
    }

    // Acá iría la validación real, como comparar con base de datos
    if ($usuario === "admin" && $contrasena === "1234") {
        echo json_encode([
            "status" => "ok",
            "message" => "Login exitoso."
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Credenciales incorrectas."
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Método no permitido."
    ]);
}
?>

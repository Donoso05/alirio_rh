<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rh";

$conexion = mysqli_connect($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $id_usuario = $_POST["id_usuario"];
    $nueva_contraseña = $_POST["nueva_contraseña"];

    // Verificar si el ID es válido
    if (empty($id_usuario) || !is_numeric($id_usuario)) {
        echo "ID de usuario no válido.";
        exit;
    }

    // Actualizar la contraseña en la base de datos
    $query = "UPDATE usuario SET contraseña = ? WHERE id_usuario = ?";
    
    // Utilizar consultas preparadas para evitar inyecciones SQL
    $stmt = mysqli_prepare($conexion, $query);
    $hashed_password = password_hash($nueva_contraseña, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "si", $hashed_password, $id_usuario);
    mysqli_stmt_execute($stmt);

    if (mysqli_affected_rows($conexion) > 0) {
        echo "Contraseña actualizada correctamente.";
    } else {
        echo "Hubo un problema al actualizar la contraseña. Por favor, inténtalo de nuevo más tarde.";
    }
} else {
    echo "Método no permitido.";
}
?>

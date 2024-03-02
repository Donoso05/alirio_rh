<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rh";

$conexion = mysqli_connect($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Obtener el ID del usuario desde la URL
    $id_usuario = $_GET["id"];

    // Verificar si el ID es válido
    if (empty($id_usuario) || !is_numeric($id_usuario)) {
        echo "ID de usuario no válido.";
        exit;
    }

    // Mostrar el formulario para actualizar la contraseña
    echo '<html>
            <head>
                <title>Actualizar Contraseña</title>
            </head>
            <body>
                <h2>Actualizar Contraseña</h2>
                <form method="post" action="pro_actualizar.php">
                    <input type="hidden" name="id_usuario" value="' . $id_usuario . '">
                    <label for="nueva_contraseña">Nueva Contraseña:</label>
                    <input type="password" name="nueva_contraseña" required>
                    <br>
                    <input type="submit" value="Actualizar Contraseña">
                </form>
            </body>
        </html>';
} else {
    echo "Método no permitido.";
}
?>





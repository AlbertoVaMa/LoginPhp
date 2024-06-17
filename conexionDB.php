<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contra = $_POST['contra'];

    // Conexión
    $host = "localhost";
    $dbuser = "root";
    $dbpass = "Michell1!!";
    $dbname = "users";

    $conn = new mysqli($host, $dbuser, $dbpass, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Validar
    $query = "SELECT * FROM admin WHERE usuario = ? AND contra = ?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }
    $stmt->bind_param("ss", $usuario, $contra);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        header("Location: login.php");
        exit();
    } else {
        header("Location: index.html");
        exit();
    }

    $stmt->close();
    $conn->close();
}

?>

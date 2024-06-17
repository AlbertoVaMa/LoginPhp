<?php
$host = "localhost";
$dbuser = "root";
$dbpass = "Michell1!!";
$dbname = "users";

$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombreRapido'];
    $apellido = $_POST['apellidoRapido'];
    $boleta = $_POST['boletaRapido'];

    $stmt = $conn->prepare("INSERT INTO peticiones (nombre, apellido, boleta) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $apellido, $boleta);
    
    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
    
    $stmt->close();
}

$conn->close();
?>

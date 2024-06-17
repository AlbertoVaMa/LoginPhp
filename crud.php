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
    $action = $_POST['action'];

    if ($action == 'create') {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $boleta = $_POST['boleta'];
        $puntuacion = $_POST['puntuacion'];

        $stmt = $conn->prepare("INSERT INTO alumnos (nombre, apellido, boleta, puntuacion) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $nombre, $apellido, $boleta, $puntuacion);
        $stmt->execute();
        $stmt->close();
    } elseif ($action == 'update') {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $boleta = $_POST['boleta'];
        $puntuacion = $_POST['puntuacion'];

        $stmt = $conn->prepare("UPDATE alumnos SET nombre = ?, apellido = ?, boleta = ?, puntuacion = ? WHERE boleta = ?");
        $stmt->bind_param("sssii", $nombre, $apellido, $boleta, $puntuacion, $boleta);
        $stmt->execute();
        $stmt->close();
    } elseif ($action == 'delete') {
        $boleta = $_POST['boleta'];

        $stmt = $conn->prepare("DELETE FROM alumnos WHERE boleta = ?");
        $stmt->bind_param("s", $boleta);
        $stmt->execute();
        $stmt->close();
    }
}

$alumnos = $conn->query("SELECT * FROM alumnos ORDER BY puntuacion DESC");

$data = [];
while ($row = $alumnos->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);

$conn->close();
?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$servername = "localhost"; 
$username_db = "root";
$password_db = "DanielCR1214@";
$dbname = "prueba";


$conn = new mysqli($servername, $username_db, $password_db, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$nombre = $_POST['nom'];
$telefono = $_POST['tel'];
$instituto = $_POST['cole'];
$curso = $_POST['carr'];


$sql = "INSERT INTO estudiantes (nom, tel, cole, carr) VALUES (?, ?, ?, ?)";


$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nombre, $telefono, $instituto, $curso);


if ($stmt->execute()) {
    header("Location: index.html?success=true");
    exit();
} else {
    echo "<script>alert('Error al registrar: " . $stmt->error . "'); window.history.back();</script>";
}

$stmt->close();
$conn->close();
?>

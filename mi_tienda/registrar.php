<?php
include('conexion.php'); // Cargar la conexión

// Obtener los datos del formulario HTML
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$password = $_POST['password'];

// Instrucción SQL para guardar el usuario
$sql = "INSERT INTO usuarios (nombre, correo, password) VALUES ('$nombre', '$correo', '$password')";

if ($conexion->query($sql) === TRUE) {
    echo "<h3>¡Usuario registrado con éxito en la Base de Datos!</h3>";
    echo "<a href='index.html'>Volver a la tienda</a>";
} else {
    echo "Error al registrar: " . $conexion->error;
}

$conexion->close();
?>
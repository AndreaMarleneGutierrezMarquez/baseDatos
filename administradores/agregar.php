<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Usuario = $_POST['Usuario'];
    $Contraseña = $_POST['Contraseña'];

    // Insertar los datos en la tabla 'administradores'
    $sql = "INSERT INTO administradores (Nombre, Apellido, Usuario, Contraseña) VALUES ('$Nombre', '$Apellido', '$Usuario', '$Contraseña')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro agregado exitosamente.";
    } else {
        echo "Error al agregar el registro: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>

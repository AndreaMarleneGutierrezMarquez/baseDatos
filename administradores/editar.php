<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $ID_Administrador = $_POST['ID_Administrador'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Usuario = $_POST['Usuario'];
    $Contraseña = $_POST['Contraseña'];

    // Actualizar la información en la base de datos
    $sql = "UPDATE administradores SET Nombre='$Nombre', Apellido='$Apellido', Usuario='$Usuario', Contraseña='$Contraseña' WHERE ID_Administrador=$ID_Administrador";

    if ($conn->query($sql) === TRUE) {
        echo "Información actualizada correctamente";
    } else {
        echo "Error al actualizar la información: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>

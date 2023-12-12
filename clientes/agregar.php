<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Telefono = $_POST['Telefono'];
    $CorreoElectronico = $_POST['CorreoElectronico'];
    $Direccion = $_POST['Direccion'];

    // Insertar los datos en la tabla 'Clientes'
    $sql = "INSERT INTO Clientes (Nombre, Apellido, Telefono, CorreoElectronico, Direccion) VALUES ('$Nombre', '$Apellido', '$Telefono', '$CorreoElectronico', '$Direccion')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro agregado exitosamente.";
    } else {
        echo "Error al agregar el registro: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>

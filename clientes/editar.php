<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $ID_Cliente = $_POST['ID_Cliente'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Telefono = $_POST['Telefono'];
    $CorreoElectronico = $_POST['CorreoElectronico'];
    $Direccion = $_POST['Direccion'];

    // Actualizar la información en la base de datos
    $sql = "UPDATE clientes SET Nombre='$Nombre', Apellido='$Apellido', Telefono='$Telefono', CorreoElectronico='$CorreoElectronico', Direccion='$Direccion' WHERE ID_Cliente=$ID_Cliente";

    if ($conn->query($sql) === TRUE) {
        echo "Información actualizada correctamente";
    } else {
        echo "Error al actualizar la información: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>

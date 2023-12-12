<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $ID_Empleado = $_POST['ID_Empleado'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Telefono = $_POST['Telefono'];
    $CorreoElectronico = $_POST['CorreoElectronico'];
    $Cargo = $_POST['Cargo'];
    $Usuario = $_POST['Usuario'];
    $Contraseña = $_POST['Contraseña'];

    // Actualizar la información en la base de datos
    $sql = "UPDATE empleados SET Nombre='$Nombre', Apellido='$Apellido', Telefono='$Telefono', CorreoElectronico='$CorreoElectronico', Cargo='$Cargo', Usuario='$Usuario', Contraseña='$Contraseña' WHERE ID_Empleado=$ID_Empleado";

    if ($conn->query($sql) === TRUE) {
        echo "Información actualizada correctamente";
    } else {
        echo "Error al actualizar la información: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>

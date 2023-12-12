<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $ID_Cita = $_POST['ID_Cita'];
    $ID_Cliente = $_POST['ID_Cliente'];
    $ID_Empleado = $_POST['ID_Empleado'];
    $ID_Servicio = $_POST['ID_Servicio'];
    $FechaCita = $_POST['FechaCita'];
    $EstadoCita = $_POST['EstadoCita'];

    // Actualizar la información en la base de datos
    $sql = "UPDATE citas SET ID_Cliente=$ID_Cliente, ID_Empleado=$ID_Empleado, ID_Servicio=$ID_Servicio, FechaCita='$FechaCita', EstadoCita='$EstadoCita' WHERE ID_Cita=$ID_Cita";

    if ($conn->query($sql) === TRUE) {
        echo "Información actualizada correctamente";
    } else {
        echo "Error al actualizar la información: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>

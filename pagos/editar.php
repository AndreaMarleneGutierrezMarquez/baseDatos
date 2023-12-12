<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $ID_Pago = $_POST['ID_Pago'];
    $ID_Cita = $_POST['ID_Cita'];
    $Monto = $_POST['Monto'];
    $MetodoPago = $_POST['MetodoPago'];
    $FechaPago = $_POST['FechaPago'];

    // Actualizar la información en la base de datos
    $sql = "UPDATE pagos SET ID_Cita=$ID_Cita, Monto=$Monto, MetodoPago='$MetodoPago', FechaPago='$FechaPago' WHERE ID_Pago=$ID_Pago";

    if ($conn->query($sql) === TRUE) {
        echo "Información actualizada correctamente";
    } else {
        echo "Error al actualizar la información: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>

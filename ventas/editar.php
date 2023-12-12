<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $ID_Venta = $_POST['ID_Venta'];
    $ID_Cliente = $_POST['ID_Cliente'];
    $FechaVenta = $_POST['FechaVenta'];
    $TotalVenta = $_POST['TotalVenta'];

    // Actualizar la información en la base de datos
    $sql = "UPDATE ventas SET ID_Cliente=$ID_Cliente, FechaVenta='$FechaVenta', TotalVenta=$TotalVenta WHERE ID_Venta=$ID_Venta";

    if ($conn->query($sql) === TRUE) {
        echo "Información actualizada correctamente";
    } else {
        echo "Error al actualizar la información: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>

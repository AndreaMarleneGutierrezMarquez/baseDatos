<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Verificar si se ha enviado el ID_Venta a eliminar
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ID_Venta'])) {
    $ID_Venta = $_GET['ID_Venta'];

    // Realizar la eliminación en la base de datos
    $sql = "DELETE FROM Ventas WHERE ID_Venta = $ID_Venta";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado exitosamente.";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
} else {
    echo "ID_Venta no proporcionado.";
}

// Cerrar la conexión
$conn->close();
?>

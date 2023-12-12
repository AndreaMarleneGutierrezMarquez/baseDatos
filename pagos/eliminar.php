<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Verificar si se ha enviado el ID_Pago a eliminar
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ID_Pago'])) {
    $ID_Pago = $_GET['ID_Pago'];

    // Realizar la eliminación en la base de datos
    $sql = "DELETE FROM Pagos WHERE ID_Pago = $ID_Pago";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado exitosamente.";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
} else {
    echo "ID_Pago no proporcionado.";
}

// Cerrar la conexión
$conn->close();
?>

<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Verificar si se ha enviado el ID_Cliente a eliminar
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ID_Cliente'])) {
    $ID_Cliente = $_GET['ID_Cliente'];

    // Realizar la eliminación en la base de datos
    $sql = "DELETE FROM Clientes WHERE ID_Cliente = $ID_Cliente";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado exitosamente.";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
} else {
    echo "ID_Cliente no proporcionado.";
}

// Cerrar la conexión
$conn->close();
?>

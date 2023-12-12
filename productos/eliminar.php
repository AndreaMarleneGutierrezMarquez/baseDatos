<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ID_Producto'])) {
    $ID_Producto = $_GET['ID_Producto'];

    $sql = "DELETE FROM Productos WHERE ID_Producto = $ID_Producto";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado exitosamente.";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
} else {
    echo "ID_Producto no proporcionado.";
}

$conn->close();
?>

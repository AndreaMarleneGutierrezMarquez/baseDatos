<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Verificar si se ha enviado el ID_Administrador a eliminar
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ID_Administrador'])) {
    $ID_Administrador = $_GET['ID_Administrador'];

    // Realizar la eliminación en la base de datos
    $sql = "DELETE FROM administradores WHERE ID_Administrador = $ID_Administrador";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado exitosamente.";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
} else {
    echo "ID_Administrador no proporcionado.";
}

// Cerrar la conexión
$conn->close();
?>

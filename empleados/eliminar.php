<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Verificar si se ha enviado el ID_Empleado a eliminar
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ID_Empleado'])) {
    $ID_Empleado = $_GET['ID_Empleado'];

    // Realizar la eliminación en la base de datos
    $sql = "DELETE FROM Empleados WHERE ID_Empleado = $ID_Empleado";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado exitosamente.";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
} else {
    echo "ID_Empleado no proporcionado.";
}

// Cerrar la conexión
$conn->close();
?>

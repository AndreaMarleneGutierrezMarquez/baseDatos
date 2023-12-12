<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $ID_Cliente = $_POST['ID_Cliente'];
    $FechaVenta = $_POST['FechaVenta'];
    $TotalVenta = $_POST['TotalVenta'];

    // Validar datos (puedes agregar más validaciones según sea necesario)
    if (empty($ID_Cliente) || empty($FechaVenta) || !is_numeric($TotalVenta)) {
        echo "ID Cliente, Fecha de Venta y Total de Venta son campos obligatorios, y el total de la venta debe ser un número.";
        exit;
    }

    // Insertar los datos en la tabla 'Ventas'
    $sql = "INSERT INTO Ventas (ID_Cliente, FechaVenta, TotalVenta) 
            VALUES ($ID_Cliente, '$FechaVenta', $TotalVenta)";

    if ($conn->query($sql) === TRUE) {
        echo "Registro de venta agregado exitosamente.";
    } else {
        echo "Error al agregar el registro de la venta: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>

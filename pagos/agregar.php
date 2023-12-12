<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $ID_Cita = $_POST['ID_Cita'];
    $Monto = $_POST['Monto'];
    $MetodoPago = $_POST['MetodoPago'];
    $FechaPago = $_POST['FechaPago'];

    // Validar datos (puedes agregar más validaciones según sea necesario)
    if (empty($ID_Cita) || empty($Monto) || empty($MetodoPago) || empty($FechaPago) || !is_numeric($Monto)) {
        echo "ID Cita, Monto, Método de Pago y Fecha de Pago son campos obligatorios, y el monto debe ser un número.";
        exit;
    }

    // Insertar los datos en la tabla 'Pagos'
    $sql = "INSERT INTO Pagos (ID_Cita, Monto, MetodoPago, FechaPago) 
            VALUES ($ID_Cita, $Monto, '$MetodoPago', '$FechaPago')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro de pago agregado exitosamente.";
    } else {
        echo "Error al agregar el registro del pago: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>

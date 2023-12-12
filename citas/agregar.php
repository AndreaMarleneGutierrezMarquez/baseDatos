<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $ID_Cliente = $_POST['ID_Cliente'];
    $ID_Empleado = $_POST['ID_Empleado'];
    $ID_Servicio = $_POST['ID_Servicio'];
    $FechaCita = $_POST['FechaCita'];
    $EstadoCita = $_POST['EstadoCita'];

    // Validar datos (puedes agregar más validaciones según sea necesario)
    if (empty($ID_Cliente) || empty($ID_Empleado) || empty($ID_Servicio) || empty($FechaCita) || empty($EstadoCita)) {
        echo "ID Cliente, ID Empleado, ID Servicio, Fecha de Cita y Estado de Cita son campos obligatorios.";
        exit;
    }

    // Insertar los datos en la tabla 'Citas'
    $sql = "INSERT INTO Citas (ID_Cliente, ID_Empleado, ID_Servicio, FechaCita, EstadoCita) 
            VALUES ($ID_Cliente, $ID_Empleado, $ID_Servicio, '$FechaCita', '$EstadoCita')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro de cita agregado exitosamente.";
    } else {
        echo "Error al agregar el registro de la cita: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>

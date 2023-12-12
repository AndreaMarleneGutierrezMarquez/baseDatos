<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $NombreServicio = $_POST['NombreServicio'];
    $DescripcionServicio = $_POST['DescripcionServicio'];
    $Precio = $_POST['Precio'];
    if (empty($NombreServicio) || !is_numeric($Precio)) {
        echo "Nombre del servicio y precio son campos obligatorios y el precio debe ser un número.";
        exit;
    }
    $sql = "INSERT INTO Servicios (NombreServicio, DescripcionServicio, Precio) 
            VALUES ('$NombreServicio', '$DescripcionServicio', $Precio)";

    if ($conn->query($sql) === TRUE) {
        echo "Registro de servicio agregado exitosamente.";
    } else {
        echo "Error al agregar el registro del servicio: " . $conn->error;
    }
}
$conn->close();
?>

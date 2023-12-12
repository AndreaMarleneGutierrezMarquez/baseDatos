<?php
include 'conexion.php';

$csvFileName = 'empleados.csv';
$csvFile = fopen($csvFileName, 'w');
$fields = array('ID_Empleado', 'Nombre', 'Apellido', 'Telefono', 'CorreoElectronico', 'Cargo', 'Usuario', 'Contraseña');
fputcsv($csvFile, $fields);

$result = $conn->query('SELECT * FROM Empleados');
while ($row = $result->fetch_assoc()) {
    fputcsv($csvFile, $row);
}

$conn->close();
fclose($csvFile);

header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=' . $csvFileName);
readfile($csvFileName);
unlink($csvFileName);
?>

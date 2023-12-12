<?php
include 'conexion.php';

$csvFileName = 'citas.csv';
$csvFile = fopen($csvFileName, 'w');
$fields = array('ID_Cita', 'ID_Cliente', 'ID_Empleado', 'ID_Servicio', 'FechaCita', 'EstadoCita');
fputcsv($csvFile, $fields);

$result = $conn->query('SELECT * FROM Citas');
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

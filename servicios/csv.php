<?php
include 'conexion.php';

$csvFileName = 'servicios.csv';
$csvFile = fopen($csvFileName, 'w');
$fields = array('ID_Servicio', 'NombreServicio', 'DescripcionServicio', 'Precio');
fputcsv($csvFile, $fields);

$result = $conn->query('SELECT * FROM Servicios');
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

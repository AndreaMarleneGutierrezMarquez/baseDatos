<?php
include 'conexion.php';

$csvFileName = 'clientes.csv';
$csvFile = fopen($csvFileName, 'w');
$fields = array('ID_Cliente', 'Nombre', 'Apellido', 'Telefono', 'CorreoElectronico', 'Direccion');
fputcsv($csvFile, $fields);

$result = $conn->query('SELECT * FROM Clientes');
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

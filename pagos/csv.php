<?php
include 'conexion.php';

$csvFileName = 'pagos.csv';
$csvFile = fopen($csvFileName, 'w');
$fields = array('ID_Pago', 'ID_Cita', 'Monto', 'MetodoPago', 'FechaPago');
fputcsv($csvFile, $fields);

$result = $conn->query('SELECT * FROM Pagos');
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

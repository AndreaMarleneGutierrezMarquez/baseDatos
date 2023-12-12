<?php
include 'conexion.php';

$csvFileName = 'ventas.csv';
$csvFile = fopen($csvFileName, 'w');
$fields = array('ID_Venta', 'ID_Cliente', 'FechaVenta', 'TotalVenta');
fputcsv($csvFile, $fields);

$result = $conn->query('SELECT * FROM Ventas');
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

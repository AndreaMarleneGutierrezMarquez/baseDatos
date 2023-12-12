<?php
include 'conexion.php';

$csvFileName = 'productos.csv';
$csvFile = fopen($csvFileName, 'w');
$fields = array('ID_Producto', 'NombreProducto', 'DescripcionProducto', 'PrecioUnitario', 'Stock');
fputcsv($csvFile, $fields);

$result = $conn->query('SELECT * FROM Productos');
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

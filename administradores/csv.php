<?php
include 'conexion.php';
$csvFileName = 'administradores.csv';
$csvFile = fopen($csvFileName, 'w');
$fields = array('ID_Administrador', 'Nombre', 'Apellido', 'Usuario', 'Contraseña');
fputcsv($csvFile, $fields);
$result = $conn->query('SELECT * FROM Administradores');
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

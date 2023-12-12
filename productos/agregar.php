<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $NombreProducto = $_POST['NombreProducto'];
    $DescripcionProducto = $_POST['DescripcionProducto'];
    $PrecioUnitario = $_POST['PrecioUnitario'];
    $Stock = $_POST['Stock'];

    if (empty($NombreProducto) || !is_numeric($PrecioUnitario) || !is_numeric($Stock)) {
        echo "Nombre del producto, precio unitario y stock son campos obligatorios y el precio unitario y el stock deben ser números.";
        exit;
    }

    $sql = "INSERT INTO Productos (NombreProducto, DescripcionProducto, PrecioUnitario, Stock) 
            VALUES ('$NombreProducto', '$DescripcionProducto', $PrecioUnitario, $Stock)";

    if ($conn->query($sql) === TRUE) {
        echo "Registro de producto agregado exitosamente.";
    } else {
        echo "Error al agregar el registro del producto: " . $conn->error;
    }
}

$conn->close();
?>

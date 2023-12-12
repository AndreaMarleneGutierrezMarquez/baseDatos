<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_Producto = $_POST['ID_Producto'];
    $NombreProducto = $_POST['NombreProducto'];
    $DescripcionProducto = $_POST['DescripcionProducto'];
    $PrecioUnitario = $_POST['PrecioUnitario'];
    $Stock = $_POST['Stock'];

    $sql = "UPDATE productos SET NombreProducto='$NombreProducto', DescripcionProducto='$DescripcionProducto', PrecioUnitario=$PrecioUnitario, Stock=$Stock WHERE ID_Producto=$ID_Producto";

    if ($conn->query($sql) === TRUE) {
        echo "Información actualizada correctamente";
    } else {
        echo "Error al actualizar la información: " . $conn->error;
    }
}

$conn->close();
?>

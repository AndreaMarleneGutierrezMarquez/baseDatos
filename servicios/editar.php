<?php
include 'conexion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_Servicio = $_POST['ID_Servicio'];
    $NombreServicio = $_POST['NombreServicio'];
    $DescripcionServicio = $_POST['DescripcionServicio'];
    $Precio = $_POST['Precio'];
    $sql = "UPDATE servicios SET NombreServicio='$NombreServicio', DescripcionServicio='$DescripcionServicio', Precio=$Precio WHERE ID_Servicio=$ID_Servicio";
    if ($conn->query($sql) === TRUE) {
        echo "Información actualizada correctamente";
    } else {
        echo "Error al actualizar la información: " . $conn->error;
    }
}
$conn->close();
?>

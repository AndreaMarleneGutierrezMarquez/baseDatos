<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Editar Servicio</title>
</head>
<body>

<div class="container mt-5">
    <h2>Editar Servicio</h2>

    <?php
    include 'conexion.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ID_Servicio = $_POST['ID_Servicio'];
        $NombreServicio = $_POST['NombreServicio'];
        $DescripcionServicio = $_POST['DescripcionServicio'];
        $Precio = $_POST['Precio'];
        $sql = "UPDATE Servicios SET NombreServicio='$NombreServicio', DescripcionServicio='$DescripcionServicio', Precio=$Precio WHERE ID_Servicio=$ID_Servicio";
        if ($conn->query($sql) === TRUE) {
            echo "Servicio actualizado exitosamente.";
        } else {
            echo "Error al actualizar el servicio: " . $conn->error;
        }
    }
    $ID_Servicio = isset($_GET['ID_Servicio']) ? $_GET['ID_Servicio'] : null;
    if ($ID_Servicio !== null) {
        $sql = "SELECT * FROM Servicios WHERE ID_Servicio = $ID_Servicio";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form action="editar.php" method="post">
                <input type="hidden" name="ID_Servicio" value="<?php echo $row['ID_Servicio']; ?>">
                <div class="form-group">
                    <label for="NombreServicio">Nombre del Servicio:</label>
                    <input type="text" class="form-control" id="NombreServicio" name="NombreServicio" value="<?php echo $row['NombreServicio']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="DescripcionServicio">Descripción del Servicio:</label>
                    <textarea class="form-control" id="DescripcionServicio" name="DescripcionServicio" rows="4"><?php echo $row['DescripcionServicio']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="Precio">Precio:</label>
                    <input type="number" step="0.01" class="form-control" id="Precio" name="Precio" value="<?php echo $row['Precio']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
            <?php
        } else {
            echo "Servicio no encontrado.";
        }
    } else {
        echo "ID_Servicio no proporcionado.";
    }
    $conn->close();
    ?>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

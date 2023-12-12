<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Editar Venta</title>
</head>
<body>

<div class="container mt-5">
    <h2>Editar Venta</h2>

    <?php
    // Incluir el archivo de conexión
    include 'conexion.php';

    // Verificar si se ha enviado el formulario de edición
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los datos del formulario
        $ID_Venta = $_POST['ID_Venta'];
        $ID_Cliente = $_POST['ID_Cliente'];
        $FechaVenta = $_POST['FechaVenta'];
        $TotalVenta = $_POST['TotalVenta'];

        // Actualizar los datos en la tabla 'Ventas'
        $sql = "UPDATE Ventas SET ID_Cliente=$ID_Cliente, FechaVenta='$FechaVenta', TotalVenta=$TotalVenta WHERE ID_Venta=$ID_Venta";

        // Ejecutar la consulta y mostrar el resultado
        if ($conn->query($sql) === TRUE) {
            echo "Venta actualizada exitosamente.";
        } else {
            echo "Error al actualizar la venta: " . $conn->error;
        }
    }

    // Obtener el ID de la venta de la URL
    $ID_Venta = isset($_GET['ID_Venta']) ? $_GET['ID_Venta'] : null;

    if ($ID_Venta !== null) {
        // Obtener los datos de la venta a editar
        $sql = "SELECT * FROM Ventas WHERE ID_Venta = $ID_Venta";
        $result = $conn->query($sql);

        // Mostrar el formulario de edición con los datos actuales
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form action="editar.php" method="post">
                <input type="hidden" name="ID_Venta" value="<?php echo $row['ID_Venta']; ?>">
                <div class="form-group">
                    <label for="ID_Cliente">ID del Cliente:</label>
                    <input type="number" class="form-control" id="ID_Cliente" name="ID_Cliente" value="<?php echo $row['ID_Cliente']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="FechaVenta">Fecha de la Venta:</label>
                    <input type="datetime-local" class="form-control" id="FechaVenta" name="FechaVenta" value="<?php echo date('Y-m-d\TH:i', strtotime($row['FechaVenta'])); ?>" required>
                </div>
                <div class="form-group">
                    <label for="TotalVenta">Total de la Venta:</label>
                    <input type="number" step="0.01" class="form-control" id="TotalVenta" name="TotalVenta" value="<?php echo $row['TotalVenta']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
            <?php
        } else {
            echo "Venta no encontrada.";
        }
    } else {
        echo "ID_Venta no proporcionado.";
    }

    // Cerrar la conexión
    $conn->close();
    ?>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

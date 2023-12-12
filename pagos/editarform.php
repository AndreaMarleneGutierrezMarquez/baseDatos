<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Editar Pago</title>
</head>
<body>

<div class="container mt-5">
    <h2>Editar Pago</h2>

    <?php
    // Incluir el archivo de conexión
    include 'conexion.php';

    // Verificar si se ha enviado el formulario de edición
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los datos del formulario
        $ID_Pago = $_POST['ID_Pago'];
        $ID_Cita = $_POST['ID_Cita'];
        $Monto = $_POST['Monto'];
        $MetodoPago = $_POST['MetodoPago'];
        $FechaPago = $_POST['FechaPago'];

        // Actualizar los datos en la tabla 'Pagos'
        $sql = "UPDATE Pagos SET ID_Cita=$ID_Cita, Monto=$Monto, MetodoPago='$MetodoPago', FechaPago='$FechaPago' WHERE ID_Pago=$ID_Pago";

        // Ejecutar la consulta y mostrar el resultado
        if ($conn->query($sql) === TRUE) {
            echo "Pago actualizado exitosamente.";
        } else {
            echo "Error al actualizar el pago: " . $conn->error;
        }
    }

    // Obtener el ID del pago de la URL
    $ID_Pago = isset($_GET['ID_Pago']) ? $_GET['ID_Pago'] : null;

    if ($ID_Pago !== null) {
        // Obtener los datos del pago a editar
        $sql = "SELECT * FROM Pagos WHERE ID_Pago = $ID_Pago";
        $result = $conn->query($sql);

        // Mostrar el formulario de edición con los datos actuales
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form action="editar.php" method="post">
                <input type="hidden" name="ID_Pago" value="<?php echo $row['ID_Pago']; ?>">
                <div class="form-group">
                    <label for="ID_Cita">ID de la Cita:</label>
                    <input type="number" class="form-control" id="ID_Cita" name="ID_Cita" value="<?php echo $row['ID_Cita']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Monto">Monto del Pago:</label>
                    <input type="number" step="0.01" class="form-control" id="Monto" name="Monto" value="<?php echo $row['Monto']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="MetodoPago">Método de Pago:</label>
                    <input type="text" class="form-control" id="MetodoPago" name="MetodoPago" value="<?php echo $row['MetodoPago']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="FechaPago">Fecha del Pago:</label>
                    <input type="datetime-local" class="form-control" id="FechaPago" name="FechaPago" value="<?php echo date('Y-m-d\TH:i', strtotime($row['FechaPago'])); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
            <?php
        } else {
            echo "Pago no encontrado.";
        }
    } else {
        echo "ID_Pago no proporcionado.";
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

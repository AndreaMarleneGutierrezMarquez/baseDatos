<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Editar Cita</title>
</head>
<body>

<div class="container mt-5">
    <h2>Editar Cita</h2>

    <?php
    // Incluir el archivo de conexión
    include 'conexion.php';

    // Verificar si se ha enviado el formulario de edición
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los datos del formulario
        $ID_Cita = $_POST['ID_Cita'];
        $ID_Cliente = $_POST['ID_Cliente'];
        $ID_Empleado = $_POST['ID_Empleado'];
        $ID_Servicio = $_POST['ID_Servicio'];
        $FechaCita = $_POST['FechaCita'];
        $EstadoCita = $_POST['EstadoCita'];

        // Actualizar los datos en la tabla 'Citas'
        $sql = "UPDATE Citas SET ID_Cliente=$ID_Cliente, ID_Empleado=$ID_Empleado, ID_Servicio=$ID_Servicio, FechaCita='$FechaCita', EstadoCita='$EstadoCita' WHERE ID_Cita=$ID_Cita";

        // Ejecutar la consulta y mostrar el resultado
        if ($conn->query($sql) === TRUE) {
            echo "Cita actualizada exitosamente.";
        } else {
            echo "Error al actualizar la cita: " . $conn->error;
        }
    }

    // Obtener el ID de la cita de la URL
    $ID_Cita = isset($_GET['ID_Cita']) ? $_GET['ID_Cita'] : null;

    if ($ID_Cita !== null) {
        // Obtener los datos de la cita a editar
        $sql = "SELECT * FROM Citas WHERE ID_Cita = $ID_Cita";
        $result = $conn->query($sql);

        // Mostrar el formulario de edición con los datos actuales
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form action="editar.php" method="post">
                <input type="hidden" name="ID_Cita" value="<?php echo $row['ID_Cita']; ?>">
                <div class="form-group">
                    <label for="ID_Cliente">ID del Cliente:</label>
                    <input type="number" class="form-control" id="ID_Cliente" name="ID_Cliente" value="<?php echo $row['ID_Cliente']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="ID_Empleado">ID del Empleado:</label>
                    <input type="number" class="form-control" id="ID_Empleado" name="ID_Empleado" value="<?php echo $row['ID_Empleado']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="ID_Servicio">ID del Servicio:</label>
                    <input type="number" class="form-control" id="ID_Servicio" name="ID_Servicio" value="<?php echo $row['ID_Servicio']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="FechaCita">Fecha de la Cita:</label>
                    <input type="datetime-local" class="form-control" id="FechaCita" name="FechaCita" value="<?php echo date('Y-m-d\TH:i', strtotime($row['FechaCita'])); ?>" required>
                </div>
                <div class="form-group">
                    <label for="EstadoCita">Estado de la Cita:</label>
                    <select class="form-control" id="EstadoCita" name="EstadoCita" required>
                        <option value="Pendiente" <?php echo ($row['EstadoCita'] === 'Pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                        <option value="Confirmada" <?php echo ($row['EstadoCita'] === 'Confirmada') ? 'selected' : ''; ?>>Confirmada</option>
                        <option value="Cancelada" <?php echo ($row['EstadoCita'] === 'Cancelada') ? 'selected' : ''; ?>>Cancelada</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
            <?php
        } else {
            echo "Cita no encontrada.";
        }
    } else {
        echo "ID_Cita no proporcionado.";
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

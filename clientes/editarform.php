<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Editar Cliente</title>
</head>
<body>

<div class="container mt-5">
    <h2>Editar Cliente</h2>

    <?php
    // Incluir el archivo de conexión
    include 'conexion.php';

    // Verificar si se ha enviado el formulario de edición
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los datos del formulario
        $ID_Cliente = $_POST['ID_Cliente'];
        $Nombre = $_POST['Nombre'];
        $Apellido = $_POST['Apellido'];
        $Telefono = $_POST['Telefono'];
        $CorreoElectronico = $_POST['CorreoElectronico'];
        $Direccion = $_POST['Direccion'];

        // Actualizar los datos en la tabla 'Clientes'
        $sql = "UPDATE clientes SET Nombre='$Nombre', Apellido='$Apellido', Telefono='$Telefono', CorreoElectronico='$CorreoElectronico', Direccion='$Direccion' WHERE ID_Cliente=$ID_Cliente";

        // Ejecutar la consulta y mostrar el resultado
        if ($conn->query($sql) === TRUE) {
            echo "Cliente actualizado exitosamente.";
        } else {
            echo "Error al actualizar el cliente: " . $conn->error;
        }
    }

    // Obtener el ID del cliente de la URL
    $ID_Cliente = isset($_GET['ID_Cliente']) ? $_GET['ID_Cliente'] : null;

    if ($ID_Cliente !== null) {
        // Obtener los datos del cliente a editar
        $sql = "SELECT * FROM Clientes WHERE ID_Cliente = $ID_Cliente";
        $result = $conn->query($sql);

        // Mostrar el formulario de edición con los datos actuales
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form action="editar.php" method="post">
                <input type="hidden" name="ID_Cliente" value="<?php echo $row['ID_Cliente']; ?>">
                <div class="form-group">
                    <label for="Nombre">Nombre:</label>
                    <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?php echo $row['Nombre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Apellido">Apellido:</label>
                    <input type="text" class="form-control" id="Apellido" name="Apellido" value="<?php echo $row['Apellido']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Telefono">Teléfono:</label>
                    <input type="text" class="form-control" id="Telefono" name="Telefono" value="<?php echo $row['Telefono']; ?>">
                </div>
                <div class="form-group">
                    <label for="CorreoElectronico">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="CorreoElectronico" name="CorreoElectronico" value="<?php echo $row['CorreoElectronico']; ?>">
                </div>
                <div class="form-group">
                    <label for="Direccion">Dirección:</label>
                    <input type="text" class="form-control" id="Direccion" name="Direccion" value="<?php echo $row['Direccion']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
            <?php
        } else {
            echo "Cliente no encontrado.";
        }
    } else {
        echo "ID_Cliente no proporcionado.";
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

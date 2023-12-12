<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Editar Registro</title>
</head>
<body>

<div class="container mt-5">
    <h2>Editar Registro</h2>

    <?php
    // Incluir el archivo de conexión
    include 'conexion.php';

    // Verificar si se ha enviado el formulario de edición
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ID_Administrador = $_POST['ID_Administrador'];
        $Nombre = $_POST['Nombre'];
        $Apellido = $_POST['Apellido'];
        $Usuario = $_POST['Usuario'];
        $Contraseña = $_POST['Contraseña'];

        // Actualizar los datos en la tabla 'administradores'
        $sql = "UPDATE administradores SET Nombre='$Nombre', Apellido='$Apellido', Usuario='$Usuario', Contraseña='$Contraseña' WHERE ID_Administrador=$ID_Administrador";

        if ($conn->query($sql) === TRUE) {
            echo "Registro actualizado exitosamente.";
        } else {
            echo "Error al actualizar el registro: " . $conn->error;
        }
    }

    // Obtener el ID de la URL
    $ID_Administrador = isset($_GET['ID_Administrador']) ? $_GET['ID_Administrador'] : null;

    if ($ID_Administrador !== null) {
        // Obtener los datos del registro a editar
        $sql = "SELECT * FROM administradores WHERE ID_Administrador = $ID_Administrador";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Mostrar el formulario de edición con los datos actuales
            ?>
            <form action="editar.php" method="post">
                <input type="hidden" name="ID_Administrador" value="<?php echo $row['ID_Administrador']; ?>">
                <div class="form-group">
                    <label for="Nombre">Nombre:</label>
                    <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?php echo $row['Nombre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Apellido">Apellido:</label>
                    <input type="text" class="form-control" id="Apellido" name="Apellido" value="<?php echo $row['Apellido']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Usuario">Usuario:</label>
                    <input type="text" class="form-control" id="Usuario" name="Usuario" value="<?php echo $row['Usuario']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Contraseña">Contraseña:</label>
                    <input type="password" class="form-control" id="Contraseña" name="Contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
            <?php
        } else {
            echo "Registro no encontrado.";
        }
    } else {
        echo "ID_Administrador no proporcionado.";
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
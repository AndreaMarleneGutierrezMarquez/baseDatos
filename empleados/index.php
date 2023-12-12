<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Salón de Belleza</title>
</head>
<body>

<div class="container mt-5">
    <h2>Formulario de Registro de Empleados</h2>
    
    <form action="agregar.php" method="post">
        <div class="form-group">
            <label for="Nombre">Nombre:</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" required>
        </div>
        <div class="form-group">
            <label for="Apellido">Apellido:</label>
            <input type="text" class="form-control" id="Apellido" name="Apellido" required>
        </div>
        <div class="form-group">
            <label for="Telefono">Teléfono:</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono">
        </div>
        <div class="form-group">
            <label for="CorreoElectronico">Correo Electrónico:</label>
            <input type="email" class="form-control" id="CorreoElectronico" name="CorreoElectronico">
        </div>
        <div class="form-group">
            <label for="Cargo">Cargo:</label>
            <input type="text" class="form-control" id="Cargo" name="Cargo">
        </div>
        <div class="form-group">
            <label for="Usuario">Usuario:</label>
            <input type="text" class="form-control" id="Usuario" name="Usuario" required>
        </div>
        <div class="form-group">
            <label for="Contraseña">Contraseña:</label>
            <input type="password" class="form-control" id="Contraseña" name="Contraseña" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>

    <hr>

    <h2>Registros de Empleados en la Base de Datos</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Correo Electrónico</th>
                <th>Cargo</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Incluir el archivo de conexión
            include 'conexion.php';

            // Realizar una consulta para obtener los registros de la tabla 'Empleados'
            $sql = "SELECT * FROM Empleados";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Mostrar los resultados en la tabla
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ID_Empleado"] . "</td>";
                    echo "<td>" . $row["Nombre"] . "</td>";
                    echo "<td>" . $row["Apellido"] . "</td>";
                    echo "<td>" . $row["Telefono"] . "</td>";
                    echo "<td>" . $row["CorreoElectronico"] . "</td>";
                    echo "<td>" . $row["Cargo"] . "</td>";
                    echo "<td>" . $row["Usuario"] . "</td>";
                    echo "<td>" . $row["Contraseña"] . "</td>";
                    echo "<td><a href='editarform.php?ID_Empleado=" . $row["ID_Empleado"] . "'>Editar</a></td>";
                    echo "<td><a href='eliminar.php?ID_Empleado=" . $row["ID_Empleado"] . "'>Eliminar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No hay registros</td></tr>";
            }
            // Cerrar la conexión
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar CSV</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Descargar CSV</h2>
        <!-- Agrega un enlace o botón para descargar el CSV -->
        <a href="csv.php" class="btn btn-primary">Descargar CSV</a>
    </div>

    <!-- Agrega la referencia a Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Agrega la referencia a Bootstrap JS y Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
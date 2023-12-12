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
    <h2>Formulario de Registro de Pagos</h2>
    
    <form action="agregar.php" method="post">
        <div class="form-group">
            <label for="ID_Cita">ID de la Cita:</label>
            <input type="text" class="form-control" id="ID_Cita" name="ID_Cita" required>
        </div>
        <div class="form-group">
            <label for="Monto">Monto:</label>
            <input type="text" class="form-control" id="Monto" name="Monto" required>
        </div>
        <div class="form-group">
            <label for="MetodoPago">Método de Pago:</label>
            <input type="text" class="form-control" id="MetodoPago" name="MetodoPago" required>
        </div>
        <div class="form-group">
            <label for="FechaPago">Fecha de Pago:</label>
            <input type="datetime-local" class="form-control" id="FechaPago" name="FechaPago" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar Pago</button>
    </form>

    <hr>

    <h2>Registros de Pagos en la Base de Datos</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID de la Cita</th>
                <th>Monto</th>
                <th>Método de Pago</th>
                <th>Fecha de Pago</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Incluir el archivo de conexión
            include 'conexion.php';

            // Realizar una consulta para obtener los registros de la tabla 'Pagos'
            $sql = "SELECT * FROM Pagos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Mostrar los resultados en la tabla
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ID_Pago"] . "</td>";
                    echo "<td>" . $row["ID_Cita"] . "</td>";
                    echo "<td>" . $row["Monto"] . "</td>";
                    echo "<td>" . $row["MetodoPago"] . "</td>";
                    echo "<td>" . $row["FechaPago"] . "</td>";
                    echo "<td><a href='editarform.php?ID_Pago=" . $row["ID_Pago"] . "'>Editar</a></td>";
                    echo "<td><a href='eliminar.php?ID_Pago=" . $row["ID_Pago"] . "'>Eliminar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No hay registros</td></tr>";
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
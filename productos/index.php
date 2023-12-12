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
    <h2>Formulario de Registro de Productos</h2>
    
    <form action="agregar.php" method="post">
        <div class="form-group">
            <label for="NombreProducto">Nombre del Producto:</label>
            <input type="text" class="form-control" id="NombreProducto" name="NombreProducto" required>
        </div>
        <div class="form-group">
            <label for="DescripcionProducto">Descripción del Producto:</label>
            <textarea class="form-control" id="DescripcionProducto" name="DescripcionProducto" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="PrecioUnitario">Precio Unitario:</label>
            <input type="text" class="form-control" id="PrecioUnitario" name="PrecioUnitario">
        </div>
        <div class="form-group">
            <label for="Stock">Stock:</label>
            <input type="text" class="form-control" id="Stock" name="Stock">
        </div>
        <button type="submit" class="btn btn-primary">Registrar Producto</button>
    </form>

    <hr>

    <h2>Registros de Productos en la Base de Datos</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Producto</th>
                <th>Descripción del Producto</th>
                <th>Precio Unitario</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Incluir el archivo de conexión
            include 'conexion.php';

            // Realizar una consulta para obtener los registros de la tabla 'Productos'
            $sql = "SELECT * FROM Productos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Mostrar los resultados en la tabla
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ID_Producto"] . "</td>";
                    echo "<td>" . $row["NombreProducto"] . "</td>";
                    echo "<td>" . $row["DescripcionProducto"] . "</td>";
                    echo "<td>" . $row["PrecioUnitario"] . "</td>";
                    echo "<td>" . $row["Stock"] . "</td>";
                    echo "<td><a href='editarform.php?ID_Producto=" . $row["ID_Producto"] . "'>Editar</a></td>";
                    echo "<td><a href='eliminar.php?ID_Producto=" . $row["ID_Producto"] . "'>Eliminar</a></td>";
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
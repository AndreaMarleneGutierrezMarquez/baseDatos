<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Editar Producto</title>
</head>
<body>

<div class="container mt-5">
    <h2>Editar Producto</h2>

    <?php
    include 'conexion.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ID_Producto = $_POST['ID_Producto'];
        $NombreProducto = $_POST['NombreProducto'];
        $DescripcionProducto = $_POST['DescripcionProducto'];
        $PrecioUnitario = $_POST['PrecioUnitario'];
        $Stock = $_POST['Stock'];

        $sql = "UPDATE Productos SET NombreProducto='$NombreProducto', DescripcionProducto='$DescripcionProducto', PrecioUnitario=$PrecioUnitario, Stock=$Stock WHERE ID_Producto=$ID_Producto";

        if ($conn->query($sql) === TRUE) {
            echo "Producto actualizado exitosamente.";
        } else {
            echo "Error al actualizar el producto: " . $conn->error;
        }
    }

    $ID_Producto = isset($_GET['ID_Producto']) ? $_GET['ID_Producto'] : null;

    if ($ID_Producto !== null) {
        $sql = "SELECT * FROM Productos WHERE ID_Producto = $ID_Producto";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form action="editar.php" method="post">
                <input type="hidden" name="ID_Producto" value="<?php echo $row['ID_Producto']; ?>">
                <div class="form-group">
                    <label for="NombreProducto">Nombre del Producto:</label>
                    <input type="text" class="form-control" id="NombreProducto" name="NombreProducto" value="<?php echo $row['NombreProducto']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="DescripcionProducto">Descripción del Producto:</label>
                    <textarea class="form-control" id="DescripcionProducto" name="DescripcionProducto" rows="4"><?php echo $row['DescripcionProducto']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="PrecioUnitario">Precio Unitario:</label>
                    <input type="number" step="0.01" class="form-control" id="PrecioUnitario" name="PrecioUnitario" value="<?php echo $row['PrecioUnitario']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Stock">Stock:</label>
                    <input type="number" class="form-control" id="Stock" name="Stock" value="<?php echo $row['Stock']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
            <?php
        } else {
            echo "Producto no encontrado.";
        }
    } else {
        echo "ID_Producto no proporcionado.";
    }

    $conn->close();
    ?>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
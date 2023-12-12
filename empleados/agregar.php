<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Telefono = $_POST['Telefono'];
    $CorreoElectronico = $_POST['CorreoElectronico'];
    $Cargo = $_POST['Cargo'];
    $Usuario = $_POST['Usuario'];
    $Contraseña = $_POST['Contraseña'];

    // Validar datos (puedes agregar más validaciones según sea necesario)
    if (empty($Nombre) || empty($Apellido) || empty($Usuario) || empty($Contraseña)) {
        echo "Nombre, Apellido, Usuario y Contraseña son campos obligatorios.";
        exit;
    }

    // Hash para la contraseña (utiliza una función segura como password_hash())
    $hashedContraseña = password_hash($Contraseña, PASSWORD_DEFAULT);

    // Insertar los datos en la tabla 'Empleados'
    $sql = "INSERT INTO Empleados (Nombre, Apellido, Telefono, CorreoElectronico, Cargo, Usuario, Contraseña) 
            VALUES ('$Nombre', '$Apellido', '$Telefono', '$CorreoElectronico', '$Cargo', '$Usuario', '$hashedContraseña')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro de empleado agregado exitosamente.";
    } else {
        echo "Error al agregar el registro del empleado: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>

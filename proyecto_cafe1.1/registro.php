<?php
require 'conexion.php'; // Incluye el archivo de conexión

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Hash de la contraseña
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    // Inserta los datos en la tabla de usuarios
    $sql = "INSERT INTO usuarios (nombre, email, contrasena, telefono, direccion) VALUES (:nombre, :email, :contrasena, :telefono, :direccion)";
    $stmt = $pdo->prepare($sql);
    
    // Asigna los valores
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':contrasena', $contrasena);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':direccion', $direccion);

    if ($stmt->execute()) {
        $success = "Registro exitoso. Puedes iniciar sesión.";
    } else {
        $error = "Error al registrar. Inténtalo de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imagenes/LaRueda.png" type="image/x-icon"> 
    <link rel="stylesheet" href="estilos/registro.css">
    <link rel="stylesheet" href="estilos/principal.css">
    <link rel="stylesheet" href="estilos/footer.css">
    <title>Registro - La Rueda Viteña</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <h2>Registro de Usuario</h2>
    <?php if (isset($success)) : ?>
        <p style="color: green; text-align: center;"><?php echo $success; ?></p>
    <?php elseif (isset($error)) : ?>
        <p style="color: red; text-align: center;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono"><br>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion"><br>

        <button type="submit">Registrarse</button>
    </form>
    <?php include 'footer.php'; ?>
</body>
</html>

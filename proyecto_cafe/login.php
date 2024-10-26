<?php
require 'conexion.php'; // Incluye el archivo de conexión

session_start(); // Inicia la sesión

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    // Verifica las credenciales
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
        // Almacena información del usuario en la sesión
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['nombre'];
        echo "<script>alert('Inicio de sesión exitoso. Bienvenido, " . htmlspecialchars($usuario['nombre']) . "!');</script>";
        header("Location: index.php");
        exit();
    } else {
        $error = "Email o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imagenes/LaRueda.png" type="image/x-icon"> 
    <link rel="stylesheet" href="estilos/login.css">
    <link rel="stylesheet" href="estilos/principal.css">
    <title>Iniciar Sesión - La Rueda Viteña</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <h2>Iniciar Sesión</h2>
    <?php if (isset($error)) : ?>
        <p style="color: red; text-align: center;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required>

        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>

<?php
session_start();
include 'conexion.php'; // Asegúrate de que la ruta es correcta

// Obtener productos
$query = "SELECT * FROM productos WHERE disponible = 1";
$productos = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imagenes/LaRueda.png" type="image/x-icon"> 
    <link rel="icon" href="imagenes/LaRueda.png" type="image/png"> 
    <link rel="stylesheet" href="estilos/principal.css">
    <title>La Rueda Viteña</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <section class="menu">
            <h1>Nuestro Menú</h1>
            
            <nav class="categorias">
                <button>Bebidas</button>
                <button>Comidas</button>
                <button>Postres</button>
                <button>Especialidades de la Casa</button>
            </nav>

            <section class="productos">
                <h2>Productos Disponibles</h2>
                <?php foreach ($productos as $producto): ?>
                    <div class="producto">
                        <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                        <h3><?php echo $producto['nombre']; ?></h3>
                        <p><?php echo $producto['descripcion']; ?></p>
                        <p>Precio: $<?php echo number_format($producto['precio'], 2); ?></p>
                        <form action="agregar_pedido.php" method="POST">
                            <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                            <input type="hidden" name="precio" value="<?php echo $producto['precio']; ?>">
                            <input type="number" name="cantidad" min="1" value="1" required>
                            <button type="submit">Agregar al Carrito</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </section>
        </section>
    </main>

    <footer>
        <p>Información de contacto</p>
        <p>Síguenos en redes sociales</p>
        <p><a href="politicas.html">Políticas de Devolución y Privacidad</a></p>
    </footer>

    <script src="scripts/main.js"></script>
</body>
</html>

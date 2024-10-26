<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imagenes/LaRueda.png" type="image/x-icon"> 
    <link rel="icon" href="imagenes/LaRueda.png" type="image/png"> 
    <title>La Rueda Viteña</title>
    <link rel="stylesheet" href="estilos/estilos.css"> 
    <link rel="stylesheet" href="estilos/principal.css">
<body>
    <?php include 'header.php'; ?>

    <main>
        <section id="inicio">
            <h2>¿Qué es nuestra Red Social?</h2>
            <p>Una plataforma para promocionar y compartir experiencias sobre nuestro producto exclusivo.</p>
        </section>

        <section id="producto">
            <h2>Producto Destacado</h2>
            <img src="imagenes/producto.jpg" alt="Imagen del Producto" />
            <p>Descripción detallada del producto, sus características y beneficios.</p>
            <button>Comprar Ahora</button>
        </section>

        <section id="testimonios">
            <h2>Testimonios de Usuarios</h2>
            <ul>
                <li>"Este producto cambió mi vida!" - Usuario 1</li>
                <li>"Excelente calidad y servicio." - Usuario 2</li>
                <li>"Lo recomiendo totalmente." - Usuario 3</li>
            </ul>
        </section>

        <section id="contactotanos">
            <h2>Contacto</h2>
            <form>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" required></textarea>
                
                <input type="submit" value="Enviar">
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Tu Marca. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

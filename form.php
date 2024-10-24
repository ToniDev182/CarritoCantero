<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compra</title>
<body>
<h1>Carrito de la compra</h1> <!-- Encabezado principal de la página -->

<div class="formulario"> <!-- Contenedor para el formulario de entrada de productos -->
    <form method="post" action=""> <!-- Formulario que envía datos mediante el método POST a la misma página -->
        <label for="nombre_producto">Introduce el nombre del producto</label><br>
        <input type="text" name="nombre_producto" id="nombre_producto" required><br>
        <!-- Campo de texto para ingresar el nombre del producto, es obligatorio -->

        <label for="precio_producto">Introduce el precio del producto</label><br>
        <input type="number" name="precio_producto" id="precio_producto" required><br>
        <!-- Campo numérico para ingresar el precio del producto, también obligatorio -->

        <label for="cantidad_producto">Introduce la cantidad</label><br>
        <input type="number" name="cantidad_producto" id="cantidad_producto" required><br>
        <!-- Campo numérico para ingresar la cantidad de producto, obligatorio -->

        <input type="submit" id="añadir_producto" name="añadir_producto" value="Añadir producto"><br>
        <!-- Botón para enviar el formulario y añadir el producto al carrito -->
    </form>
</div>

<div class="precio_total"> <!-- Contenedor para el formulario de mostrar el precio total -->
    <form method="post" action=""> <!-- Formulario que envía datos mediante el método POST a la misma página -->
        <input type="submit" id="precio_total" name="precio_total" value="Mostrar precio total"><br>
        <!-- Botón para enviar el formulario y mostrar el precio total del carrito -->
    </form>
</div>

<?php include 'Siscompras.php'; ?> <!-- Inclusión del archivo PHP que contiene la lógica para manejar el carrito de compras -->

</body>
</html>

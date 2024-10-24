<?php
session_start(); // Inicia la sesión para gestionar el carrito de compras

// Comprueba si el carrito no está inicializado y lo crea como un array vacío
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = []; // Inicializa el carrito si no existe
}

// Maneja el formulario para añadir un producto al carrito
if (isset($_POST['añadir_producto'])) {
    // Obtiene los datos del formulario
    $nombre_producto = $_POST['nombre_producto'];
    $cantidad_producto = $_POST['cantidad_producto'];
    $precio_producto = $_POST['precio_producto'];

    // Crea un array para el producto con sus detalles
    $producto = [
        "nombre_producto" => $nombre_producto,
        "cantidad_producto" => $cantidad_producto,
        "precio_producto" => $precio_producto,
        "subtotal" => $precio_producto * $cantidad_producto // Calcula el subtotal
    ];

    // Añade el producto al carrito
    $_SESSION['carrito'][] = $producto; // Agrega el producto al carrito
}

// Función para calcular el total del carrito
function calcular_total() {
    $total = 0; // Inicializa el total en 0
    if (isset($_SESSION['carrito'])) {
        // Recorre el carrito y suma los subtotales
        foreach ($_SESSION['carrito'] as $producto) {
            $total += $producto['subtotal'];
        }
    }
    return $total; // Devuelve el total calculado
}

// Muestra los productos en el carrito
if (!empty($_SESSION['carrito'])) {
    echo "<h2>Productos en el carrito:</h2>"; // Encabezado para los productos
    // Recorre el carrito para mostrar cada producto
    foreach ($_SESSION['carrito'] as $indice => $producto) {
        echo "<p>Producto: " . $producto['nombre_producto'] . "</p>"; // Nombre del producto
        echo "<p>Precio: $" . $producto['precio_producto'] . "</p>"; // Precio del producto
        echo "<p>Cantidad: " . $producto['cantidad_producto'] . "</p>"; // Cantidad del producto
        echo "<p>Subtotal: $" . $producto['subtotal'] . "</p>"; // Subtotal del producto
        // Enlace para eliminar el producto del carrito
        echo "<a href='?eliminar=$indice'>Eliminar</a>";
        echo "<hr>"; // Separador entre productos
    }
} else {
    // Mensaje si el carrito está vacío
    echo "<p>El carrito está vacío.</p>";
}

// Maneja la eliminación de un producto del carrito
if (isset($_GET['eliminar'])) {
    $indice = $_GET['eliminar']; // Obtiene el índice del producto a eliminar
    // Comprueba si el índice existe en el carrito
    if (isset($_SESSION['carrito'][$indice])) {
        unset($_SESSION['carrito'][$indice]); // Elimina el producto
        $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexa el array del carrito
        header("Location: " . $_SERVER['PHP_SELF']); // Redirige a la misma página
        exit(); // Asegura que se detenga la ejecución del script
    }
}

// Maneja la solicitud para mostrar el precio total
if (isset($_POST['precio_total'])) {
    // Si el carrito no está vacío, calcula y muestra el total
    if (!empty($_SESSION['carrito'])) {
        $total = calcular_total(); // Calcula el total
        echo "<h2>Precio total: $" . $total . "</h2>"; // Muestra el precio total
    }
}
?>

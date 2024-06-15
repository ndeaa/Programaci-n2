<?php
session_start();

// Función para agregar un producto
function agregarProducto($productos, $nombre, $cantidad, $valor, $modelo) {
    $productos[] = [
        'producto' => $nombre,
        'cantidad' => $cantidad,
        'precio' => $valor,
        'modelo' => $modelo
    ];
    return $productos;
}

// Función para buscar un producto por modelo
function buscarProducto($productos, $modelo) {
    foreach ($productos as $producto) {
        if ($producto['modelo'] == $modelo) {
            return "Nombre: " . $producto['modelo'] . "<br>";
        }
    }
    return "Producto no encontrado.<br>";
}

// Función para mostrar todos los productos
function mostrarProductos($productos) {
    $result = '';
    foreach ($productos as $producto) {
        $result .= "Producto encontrado - Nombre: " . $producto['producto'] . ", Cantidad: " . $producto['cantidad'] . ", valor: " . $producto['precio'] . ", Modelo: " . $producto['modelo'] . "<br>";
    }
    return $result;
}

// Función para actualizar un producto por modelo
function actualizarProducto($productos, $modelo, $nombre, $cantidad, $valor) {
    foreach ($productos as &$producto) {
        if ($producto['modelo'] == $modelo) {
            $producto['producto'] = $nombre;
            $producto['cantidad'] = $cantidad;
            $producto['precio'] = $valor;
            break;
        }
    }
    return $productos;
}

// Inicializar el array de productos en la sesión
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}

$productos = $_SESSION['productos'];
$resultado = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST['accion'];

    switch ($accion) {
        case 'agregar':
            $nombre = $_POST['nombre'] ?? '';
            $cantidad = $_POST['cantidad'] ?? '';
            $valor = $_POST['valor'] ?? '';
            $modelo = $_POST['modelo'] ?? '';
            $productos = agregarProducto($productos, $nombre, $cantidad, $valor, $modelo);
            $resultado = "Producto agregado correctamente.<br>";
            break;
        
        case 'buscar':
            $modelo = $_POST['modelo_buscar'] ?? '';
            $resultado = buscarProducto($productos, $modelo);
            break;
        
        case 'mostrar':
            $resultado = mostrarProductos($productos);
            break;
        
        case 'actualizar':
            $modelo = $_POST['modelo_actualizar'] ?? '';
            $nombre = $_POST['nombre_actualizar'] ?? '';
            $cantidad = $_POST['cantidad_actualizar'] ?? '';
            $valor = $_POST['valor_actualizar'] ?? '';
            $productos = actualizarProducto($productos, $modelo, $nombre, $cantidad, $valor);
            $resultado = "Producto actualizado correctamente.<br>";
            break;

        case 'limpiar':
            $_SESSION['productos'] = [];
            $resultado = "Productos eliminados correctamente.<br>";
            session_destroy();
            break;

        default:
            $resultado = "Acción no válida.";
    }

    $_SESSION['productos'] = $productos;
    $_SESSION['resultado'] = $resultado;
}

// Redirigir de vuelta al formulario
header("Location: formulario.php");
exit();
?>
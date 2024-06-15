<?php
session_start();

// Agregar funciones
function agregarProducto($nombre, $cantidad, $valor, $modelo) {
    $producto[] = [
        'nombre' => $nombre,
        'cantidad' => $cantidad,
        'valor' => $valor,
        'modelo' => $modelo
    ];
    return $producto;
}

// Función para buscar un producto por modelo
function buscarProducto($productos, $modelo) {
    foreach ($productos as $producto) {
        if ($productos['modelo'] == $modelo) {
            return "Producto encontrado - Nombre: " . $producto['producto'] . ", Cantidad: " . $producto['cantidad'] . ", Valor: " . $producto['precio'] . ", Modelo: " . $producto['modelo'] . "<br>";
        }
    }
    return "Producto no encontrado.<br>";
 }

function mostrarProductos($productos) {
    $result = '';
    foreach ($productos as $producto) {
        $result .= "Nombre: " . $producto['nombre'] . 
        ", cantidad: " . $producto['cantidad'] . 
        "valor: " . $producto['valor'] .
        "modelo: " . $producto['modelo'] 
    ."<br>";
        
   
    }
    return $result;
}

function actualizarProducto( $productos, $nombre, $cantidad, $valor, $modelo) {
    foreach ($productos as &$producto) {
        if ($producto['nombre'] == $nombre) {
            $producto['cantidad'] = $cantidad;
            $producto['valor'] = $valor;
            $producto['modelo'] = $modelo;
          
            break;
        }
    }
    return $productos;
}

function calcularValorPromedio($productos) {
    $total = 0;
    foreach ($productos as $producto) {
        $total += $producto['valor'];
    }
    if (count($productos) > 0) {
        return $total / count($productos);
    } else {
        return 0;
    }
}


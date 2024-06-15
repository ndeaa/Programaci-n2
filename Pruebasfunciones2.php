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
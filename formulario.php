<?php
session_start();
$resultado = '';

// Verificar si hay un resultado almacenado en la sesión
if (isset($_SESSION['resultado'])) {
    $resultado = $_SESSION['resultado'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
</head>
<body>
    <form action="procesamiento.php" method="POST">
        <label for="nombre">Producto:</label>
        <input type="text" id="nombre" name="nombre"><br>
        
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad"><br>
        
        <label for="precio">Valor:</label>
        <input type="number" id="valor" name="valor"><br>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo"><br>
        
        <input type="radio" id="agregar" name="accion" value="agregar">
        <label for="agregar">Agregar Producto</label><br>
        
        <input type="radio" id="buscar" name="accion" value="buscar">
        <label for="buscar">BuscarProductos</label><br>

        <input type="radio" id="mostrar" name="accion" value="mostrar">
        <label for="mostrar">Mostrar Productos</label><br>
        
        <input type="radio" id="actualizar" name="accion" value="actualizar">
        <label for="actualizar">ActualizarProductos</label><br>

        <input type="radio" id="calcular" name="accion" value="calcular">
        <label for="calcular">Calcular Valor Total</label><br>

        <input type="radio" id="filtrar" name="accion" value="filtrar">
        <label for="filtrar">Filtrar Productos Por Valor</label><br>
        
        <input type="radio" id="listar" name="accion" value="listar">
        <label for="listar">Listar Modelos Disponibles</label><br>

        <input type="radio" id="calcular" name="accion" value="calcular">
        <label for="calcular">Calcular Valor Promedio</label><br>


        <input type="submit" value="Enviar">
    </form>

    <form action="procesamiento.php" method="POST">
        <input type="hidden" name="accion" value="limpiar">
        <input type="submit" value="Limpiar Resultados">
    </form>

    <!-- <div id="resultados">
    
       
    </div> -->

    <div id="resultados">
    <?php echo $resultado; 
   
    ?>
    
    </div>

    
</body>
</html>
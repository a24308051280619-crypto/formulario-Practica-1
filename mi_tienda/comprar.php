<?php 
//Incluir un archivo 
include('conexion.php'); 

$marca = $_POST['marca'];          // Nombre/marca del producto seleccionado
$cantidad = $_POST['cantidad'];    // Unidades del producto a comprar
$direccion = $_POST['direccion'];  // Dirección de entrega proporcionada por el usuario
$pago = $_POST['pago'];            // Método de pago seleccionado (Tarjeta o Efectivo)

//Preparación de la consulta SQL para insertar la información en la tabla 'pedidos'
$sql = "INSERT INTO pedidos (marca_producto, cantidad, direccion, metodo_pago) 
        VALUES ('$marca', '$cantidad', '$direccion', '$pago')";

//Ejecución de la consulta en la base de datos y validación del resultado
if ($conexion->query($sql) === TRUE) {
    // Si el registro se guarda correctamente, muestra la confirmación al cliente
    echo "<h3>¡Pedido realizado y guardado con éxito!</h3>";
    echo "<p><strong>Producto:</strong> $marca</p>";
    echo "<p><strong>Cantidad:</strong> $cantidad</p>";
    echo "<a href='index.html'>Volver a la tienda</a>";
    echo "<h3>¡Un Corpser abrirá un agujero de emergencia para entregar su pedido!</h3>";
    echo "<h3>Si no recibe su pedido en menos de 28hrs se lleva un peluche de Berserker ¡GRATIS!</h3>";
} else {
    // Si ocurre un error durante el INSERT, imprime el mensaje detallado de MySQL
    echo "Error al procesar la compra: " . $conexion->error;
}
$conexion->close();//Cierra la conexión activa con la base de datos para liberar recursos
?>
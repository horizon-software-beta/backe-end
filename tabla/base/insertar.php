<?php

// se crea una conexion a la conexion hacia la base de datos
// esto es necesario ya que de no conectarse no se puede realizar algun cambio
include("conexion.php");
$con=conectar();

// se definen las columnas para poder modificarlas
$cod_Producto=$_POST['cod_Producto'];
$Nombre=$_POST['Nombre'];
$Precio=$_POST['Precio'];
$Unidad=$_POST['Unidad'];
$Existencia=$_POST['Existencia'];
$Costo=$_POST['Costo'];

// se crea un query que lo que hace es añadir datos a las columnas de una tabla por mediante de valores 
$sql=" INSERT INTO producto values('$cod_Producto', '$Nombre', '$Precio', '$Unidad', '$Existencia', '$Costo')";
$query=mysqli_query($con, $sql);

// es la direccion de la cual se realizara la operacion
if($query){
    header("location: alumno.php");

}else{
}
?>
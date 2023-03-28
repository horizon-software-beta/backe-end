<?php


// se crea la conexion a el archivo de "conexion" para poder realizar cambios en la base de datos
include("conexion.php");
// se define "con" como "conectar"
$con=conectar();

// se realiza la conexion a la tabla y columna
$cod_Producto=$_GET['id'];

// se crea un query que realiza una eliminacion a un dato en la base de datos
$sql="DELETE FROM producto WHERE cod_Producto='$cod_Producto'";
$query=mysqli_query($con, $sql);

    // es la direccion de la cual va a realizar la operacion
    if($query){
        Header("location: alumno.php");
    }
?>
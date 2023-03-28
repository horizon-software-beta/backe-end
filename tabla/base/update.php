<?php

// se crea una conexion a el archivo "conexion" para poder acceder a la base de datos
include("conexion.php");
$con=conectar();

// es el dato que pide para poder realizar su operacion 
$cod_Producto=$_POST['cod_Producto'];
$Nombre=$_POST['Nombre'];
$Precio=$_POST['Precio'];
$Unidad=$_POST['Unidad'];
$existencia=$_POST['existencia'];

// la operacion que se busca realizar es modificar o cambiar los valores de un articulo 
$sql="UPDATE producto SET Nombre='$Nombre', Precio='$Precio', unidad='$Unidad', Existencia='$Existencia' WHERE cod_Producto='$cod_Producto'";
$query=mysqli_query($con, $sql);

    // se crea el lugar a donde tiene que modificar
    if($query){
        Header("Location: alumno.php");
    }
?>
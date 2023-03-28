<?php

// se crea la conexion a el archivo "conexion"
include("conexion.php");
$con=conectar();

// es para marcar por que cosa se identifican y por ese medio se buscan
$cod_Producto=$_GET['id'];

// se crea un select para seleccionar la tabla necesaria y sus valores
$sql="SELECT * FROM producto WHERE cod_Producto='$cod_Producto'";
$query=mysqli_query($con, $sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UFF-8">
        <meta name="viewport" content="whidth=device-width, initial-scale=1">
        <link href="" rel="stylesheet">
        <title>Actualizar</title>

    </head>
    <body>
        <div class="container mt-5">
            <form action="update.php" method="POST">
                <input type="hidden" name="cod_Producto" value="<?php echo $row['cod_Producto']?>">

                    <input type="text" class="form-control mb-3" name="Nombre" placeholder="nombre" value="<?php echo $row['Nombre']?>">
                    <input type="text" class="form-control mb-3" name="Precio" placeholder="precio" value="<?php echo $row['Precio']?>">
                    <input type="text" class="form-control mb-3" name="Unidad" placeholder="unidad" value="<?php echo $row['Unidad']?>">
                    <input type="text" class="form-control mb-3" name="Existencia" placeholder="existencia" value="<?php echo $row['Existencia']?>">
                    <input type="text" class="form-control mb-3" name="Costo" placeholder="costo" value="<?php echo $row['Costo']?>">

                <input type="submit" class="btn btn-ptimary btn-block" value="Actualizar">
            </form>
        </div>

    </body>
</html>

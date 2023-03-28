<?php

   include("conexion.php");
   $con=conectar();
   //Primero hace esta consulta sql
   //Sin existe hace el procedimiento de if si no 
   //sigue utilizando este valor pero si existe 
   //va ahcer igual a  $sql="SELECT * FROM productos WHERE Nombre like '%$Nombre%'"; y
   //el query de abajo hace la coneccion y utiliza el valor de sql dependiendo si se cumple la 
   //condicion o no se utiliza uno o el otro que se menciona anterior mente 
   $sql="SELECT * FROM producto WHERE Nombre";
   //Si existe el archivo 
   //si existe un metodo post que se llama buscar
   if(isset($_POST['buscar'])){
    //Creo una variable llamada nombre y que a dentro de post me traiga el nombre 
    $Nombre=$_POST['nombre'];
    //selecciona la tabla productos el campo nombre y like es para que lo que tenga adentro lo busca
    $sql="SELECT * FROM producto WHERE Nombre like '%$Nombre%'";
   }
  
   $query=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<!--Especifica el idioma natural del contenido de una página web-->
<html lang="en">
<!--Provee información general-->
<head>
    <!--Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!--Especifica la codificación de caracteres del documento-->
    <meta charset="UTF-8">
    <!--le permite al usuario o al navegador establecer el modo de compatibilidad-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Sirve para definir qué área de pantalla está disponible al renderizar un documento-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Titulo de la pagina-->
    <title>Tabla de edicion de productos</title>
    <!-- Define una hoja de estilos conectada-->
    <link rel="stylesheet" href="style.css"/>
    <!-- define una hoja de estilos preferida o alternativa-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--Se cierra la etiqueta-->
</head>
<!--contienen atributos que controlan la parte visible del documento-->
<body>
    <!--La clase nos separa un poco de la parte superior como a los lados -->
    <div class="container mt-5">
        <!--Divide la pagina en 2 partes row registro y la tabla -->
        <div class="row">
            <!--Donde se llenan los campos ponemos un ancho de 3-->
            <div class="col-md-3"> 
                <h1>Ingrese Datos de la comida </h1>
                <!--Formulario-->
                <!--From tiene una accion de insertar php cuando se llene el formulario
                al dar clic al boton este me llevara a insertar php-->
                <form action="insertar.php" method="POST">

                    <!--input es para que el usuario pueda llenar los campos 
                        type es el tipo del input que sera text 
                        le asignamos clases que seran las que modifican a los campos con un tamaño de 3
                        name son los identificadores de la base de datos 
                        placeholder es lo que nos muestra el campo a rellenar-->
                    <input type="text" class="form-control mb-3" name="cod_Producto" placeholder="cod_Producto">
                    <input type="text" class="form-control mb-3" name="Nombre" placeholder="nombre">
                    <input type="text" class="form-control mb-3" name="Precio" placeholder="precio">
                    <input type="text" class="form-control mb-3" name="Unidad" placeholder="unidad">
                    <input type="text" class="form-control mb-3" name="Existencia" placeholder="existencia">
                    <input type="text" class="form-control mb-3" name="Costo" placeholder="costo">

                    <!--Boton para enviar el registro-->
                    <!--Para que el boton este de color azul le asigne la clase "btn-primary" -->
                    <input type="submit" class="btn btn-primary">

                </form>

            </div>
            <!--Donde me muestra las tablas va a tener un ancho de 8-->
            <div class="col-md-8">
                <!--Creamos un formulario para la busqueda de elementos en la tabla-->
                <!--Action nos redirije a esta mismo archivo -->
                <form action="alumno.php" method="POST">
                    <!--Divide todo el ancho de la columna en 12-->
                    <div class="row">
                        <!--Mitad del ancho del encabezado de la tabla va hacer para la caja de texto el input-->
                        <div class="col-6">
                             <!--Caja de texto donde podremos buscar en la tabla-->
                             <input type="text" name="Nombre" class="form-control" placeholder="Buscar alimento">
                        </div>

                        <!--Otra columna de 6 para que sean 12 y el row se encarga de dividirlos-->
                        <div class="col-6">
                            <!--Boton de busqueda-->
                            <!--Tipo submit ya que los formularios solo hacen caso a los submit-->
                            <input type="submit" value="Buscar" name="buscar" class="btn btn-secondary">
                        </div>
                       
                        
                    </div>
                     

                </form>
                

            
                <!--Creamos la tabla con la clase del mismo nombre para que
                torme forma de esta y un margen superior de 3 para separar la tabla de la caja de busqueda  -->
                <table class="table mt-3">
                    <!--Encabezado representa la fila donde estaran nustros campos-->
                    <thead class="table-success table-striped">
                        <tr>
                            <!--Cuerpo de nuestra tabla-->
                            <!--th aparte de servir para los campos tambien sirve para dar 
                            continuacion con nustra linea verde en nustra tabla cada th agranda la barra de color verde-->
                            <th>cod_Producto</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Unidad</th>
                            <th>Existencia</th>
                            <th>Costo</th>
                        </tr>
                    </thead>

                    <!--Cuerpo de la tabla-->
                    <tbody>
                        <!--Me agrega lo que hay de la base de datos lo agrega a la 
                        tabla en sus apartados correspondientes-->
                            <?php
                                while($row=mysqli_fetch_array($query)){
                            ?>
                                <tr>
                                    <th><?php echo $row['cod_Producto']?></th>
                                    <th><?php echo $row['Nombre']?></th>
                                    <th><?php echo $row['Precio']?></th>
                                    <th><?php echo $row['Unidad']?></th>
                                    <th><?php echo $row['Existencia']?></th>
                                    <th><?php echo $row['Costo']?></th>
                                    <!--Boton para editar la tabla-->
                                    <!--row es un boton que me va a permitir capturar un valor, me captura todo lo relacionado a 'cod_estudiante
                                    a la hora de editar este captura el codigo de los alimentos '  -->
                                    <!--Al dar clic a este boton este llamara a actualizar.php-->
                                    <th> <a href="actualizar.php?id=<?php echo $row['cod_Producto'] ?>" class="btn btn-info">Editar</a></th>

                                    <!--Boton para eliminar un registro de la tabla-->
                                    <!--row es un boton que capturar un valor que es 'cod_estudiante'
                                    a la hora de eliminar este captura el codigo del  alimentos y por medio de este lo puede eliminar '  -->
                                    <!--Al dar clic a este boton este llamara a delete.php-->
                                    <th><a href="delete.php?id=<?php echo $row['cod_Producto'] ?>" class="btn btn-danger">Eliminar></a></th>
                                </tr>
                            <?php
                                }
                            ?>
                        
                    </tbody>

                </table>
                

            </div>

        </div>

    </div>
    
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!--Data table BOOSTRAP5-->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <!---->
    <script>let table = new DataTable('#myTable');</script>
<!--Se cierra la etiqueta-->
</body>
<!--Se cierra el html-->
</html>
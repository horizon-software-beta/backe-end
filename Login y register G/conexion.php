<?php
// Conectarse a la base de datos
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "registro";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
echo "Conexión exitosa";

$id_User = $_POST["id_User"] ;
$nombre = $_POST["nombre"] ;
$apellidoP = $_POST["apellidoP"] ;
$apellidoM = $_POST["apellidoM"] ;
$email = $_POST["email"] ;
$contrasena = $_POST["contraseña"] ;
$pais = $_POST["pais"] ;
$telefono = $_POST["telefono"] ;
$fecha = $_POST["fecha"] ;

$contrasena = hash('sha512', $contrasena);

// Agregar datos a la tabla
$sql = "INSERT INTO users (id_User, nombre, apellidoP, apellidoM, contraseña, pais, telefono, fecha, email )
VALUES ('$id_User', '$nombre', '$apellidoP', '$apellidoM', '$contrasena', '$pais', '$telefono', '$fecha', '$email')";

if (mysqli_query($conn, $sql)) {
    echo "Datos agregados correctamente";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>
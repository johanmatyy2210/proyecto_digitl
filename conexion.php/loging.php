<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass ="";
$dbname ="test"

$conn = mysqli_conect($dbhost, $dbuser, $dbpass, $dbname) ;
if (!$conn)
{
    die("no hay conexion:". mysqli_conect_error() );
}

$nombre = $ POST["txtusuario"];
$pass = $_POST[txtpassword];

$query = mysqli_($conn,"select * FROM loging WHERE usuario ="'.$pass."'");
$nr = mysqli_num_rows($query);

if($nr== 1)
{
//header(location: index.html)
echo"bienvenido" .$nombre
}
else if ($nr==0)
{
echo "no ingreso";
}
?>
<?php 

include_once "connection.php";

$x = new createConnection();
$x -> connectToDatabase();
$x -> selectDatabase();

$resultado = mysql_query("SELECT Usuario, FKTipoDeUsuario FROM Usuario WHERE Usuario = '".$_POST["user"]."' and Password = '".$_POST["pass"]."' ");
$valido = mysql_num_rows($resultado);


if (!$resultado) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$row = mysql_fetch_row($resultado);

if($valido == 0)
{
session_set_cookie_params(0);
session_start();

$_SESSION["rbnormaluser"] = md5($row[0]);
header("Location: ../?error");

}
else{
	$_SESSION["rbinstitutionuser"] = md5($row[0]);
	header("Location: ../home.php");
}

$x -> closeConnection();

?>
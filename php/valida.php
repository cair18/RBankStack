<?php 
include_once "connection.php";

$x = new createConnection();
$x -> connectToDatabase();
$x -> selectDatabase();

$resultado = mysql_query("SELECT Usuario, FKTipoDeUsuario, Nombre, Apellidos, PKUsuario FROM Usuario WHERE Usuario = '".$_POST["user"]."' and Password = '".$_POST["pass"]."' ");
$valido = mysql_num_rows($resultado);

if (!$resultado) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}

if($valido == 1)
{
	session_unset();
	session_set_cookie_params(0);
	session_start();
	$row = mysql_fetch_row($resultado); 

	$cookie_name = 'usuario';
	$cookie_value = $row[0];
	setcookie($cookie_name, $cookie_value, time() + 6400, '/'); // 86400 = 1 day

	$cookie_name = 'pkusuario';
	$cookie_value = $row[4];
	setcookie($cookie_name, $cookie_value, time() + 6400, '/'); // 86400 = 1 day

	//Donador
	if($row[1] == 1){
		$_SESSION["rbnormaluser"] = md5($row[0]);
		header("Location: /rbank");
	}
	
	//Institucion
	else if($row[1] == 2){
		$_SESSION["rbinstitutionuser"] = md5($row[0]);
		header("Location: ../home.php?v=h");
	}
	
}
else
{
	header("Location: ../?error");
}
$x -> closeConnection();

?>
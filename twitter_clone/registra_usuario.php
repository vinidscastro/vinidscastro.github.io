<?php

require_once('db.class.php');

$usuario = $_POST['usuario'];

$email = $_POST['email'];

$senha = md5($_POST['senha']);

$objDb = new db();

$link = $objDb->conecta_mysql();


$usuario_existe = false;
$email_existe =  false;


//verificar usuario


//verificar email

$sql = "select * from usuarios where usuario = '$usuario' ";
if($resultado_id  = mysqli_query($link, $sql)){

	$dados_usuario = mysqli_fetch_array($resultado_id);

	if(isset($dados_usuario['usuario'])){
		$usuario_existe = true;
	} 
} else{
	echo "deu ruim";
};


//verificar email


$sql = "select * from usuarios where email = '$email' ";
if($resultado_id  = mysqli_query($link, $sql)) {

	$dados_usuario = mysqli_fetch_array($resultado_id);

	if(isset($dados_usuario['email'])){
		$email_existe =  true;
	} 

} else{
	echo "deu ruim";
};

if ($usuario_existe || $email_existe) {

	# code...
	$retorno_get = '';

	if ($usuario_existe) {
		$retorno_get.="erro_usuario=1&";
	}

	if ($email_existe) {
		$retorno_get.="erro_email=1&";
	}

	
	header('location:inscrevase.php?'.$retorno_get);
	die();
	
}
else{
	header('location:index.php');

}
;


$sql = "INSERT INTO usuarios(usuario, email, senha) values ('$usuario','$email','$senha')";

//execeutar a query
if(mysqli_query($link, $sql)){

}
else{
	echo "Erro ao registrar o usuário";
};





//$_GET[]


?>
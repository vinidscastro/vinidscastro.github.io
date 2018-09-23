<?php
	session_start();

	if(!isset($_SESSION['usuario'])){
	header('location: index.php?erro=1');
}

	require_once('db.class.php');

	$id_usuario = $_SESSION['id_usuario'];

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$sql =" SELECT  DATE_FORMAT(t.data_inclusao, '%d %b %Y %T') as dt_format, t.tweet, u.usuario";
	$sql.=" from tweet as t join usuarios as u on (t.id_usuario = u.id)";
	$sql.=" WHERE  id_usuario = $id_usuario";
	$sql.=" OR id_usuario IN (select seguindo_id_usuario from usuarios_seguidores where id_usuario = $id_usuario)";
	$sql.=" ORDER BY data_inclusao DESC";

	

	$resultado_id  = mysqli_query($link, $sql);

	if($resultado_id){

		while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {

			echo '<a href="#" class="list-group-item">';
			echo '<h4 class="list-group-item-heading">'.$registro	['usuario'].'<small> - '.$registro['dt_format'].'</small></h4>';
			echo '<p class="list-group-item-text">'.$registro['tweet'].'</p>';
			echo "</a>";
		}

	} else {
		echo 'Deu ruim';
	};

?>
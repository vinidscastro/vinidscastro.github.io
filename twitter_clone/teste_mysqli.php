<?php
	
	require_once('db.class.php');

	
	$sql = "SELECT * FROM usuarios where id = 7";

	$objDb = new db();

	$link = $objDb->conecta_mysql();

	$resultado_id = mysqli_query($link, $sql);

	if ($resultado_id) {
		$dados_usuario = array();

		while($linha = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

			$dados_usuario[] = $linha;	
		}
			

		foreach ($dados_usuario as $usuario ) {

			var_dump($usuario);
			echo "<br>","<br>","<br>";
			# code...
		}
		
		} else {
		echo 'Erro na execução';
	}

	

	


	//update (true/false)

	//insert (true/false)

	//select (false/resource)

	//delete (true/false)



?>
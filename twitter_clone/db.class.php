<?php

class db{



	//host
	private $host = 'localhost';
	//usuario

	private $usuario = 'root';

	//senha
	private $senha = '';

	//banco de dados
	private $database = 'twitter_clone';

	public function conecta_mysql(){

		//criar conexão
		$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database );

		//ajustar o ch
		mysqli_set_charset($con, 'utf8');

		//verificação conexão

		if(mysqli_connect_errno()){
			echo 'Erro ao conectar com o Banco de dados mySQL:' .mysqli_connect_error();
		}

		return $con;
	}

}



?>
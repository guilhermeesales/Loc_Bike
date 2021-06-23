<?php

	/* @Autor: Dalker Pinheiro
	   Classe DAO */

class AlugamDAO{
	//Carrega um elemento pela chave primária
	public function carregar($id_usuario, $id_bicicleta){
		include("../Connection/conexao.php");
		$sql = 'SELECT * FROM alugam WHERE id_usuario = :id_usuario AND id_bicicleta = :id_bicicleta';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":id_usuario", $id_usuario);
		$consulta->bindValue(":id_bicicleta", $id_bicicleta);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		include("../Connection/conexao.php");
		$sql = 'SELECT * FROM alugam';
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		include("../Connection/conexao.php");
		$sql = 'SELECT * FROM alugam ORDER BY '.$coluna;
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Apaga um elemento da tabela
	public function deletar($id_bicicleta){
		include("../Connection/conexao.php");
		$sql = 'DELETE FROM alugam WHERE id_bicicleta = :id_bicicleta ';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":id_bicicleta",$id_bicicleta);
		if($consulta->execute())
			return true;
		else
			return false;
	}

	//Insere um elemento na tabela
	public function inserir($alugam){
		include("../Connection/conexao.php");
		$sql = 'INSERT INTO alugam (data_do_aluguel, qtnd_tempo, data_devolucao, id_usuario, id_bicicleta) VALUES (:data_do_aluguel, :qtnd_tempo, :data_devolucao, :id_usuario, :id_bicicleta)';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':data_do_aluguel',$alugam->getDataDoAluguel());

		$consulta->bindValue(':qtnd_tempo',$alugam->getQtndTempo());

		$consulta->bindValue(':data_devolucao',$alugam->getDataDevolucao());

		$consulta->bindValue(':id_usuario',$alugam->getIdUsuario());

		$consulta->bindValue(':id_bicicleta',$alugam->getIdBicicleta());
		if($consulta->execute())
			return true;
		else
			return false;
	}

	//Atualiza um elemento na tabela
	public function atualizar($alugam){
		include("../Connection/conexao.php");
		$sql = 'UPDATE alugam SET data_do_aluguel = :data_do_aluguel, qtnd_tempo = :qtnd_tempo, data_devolucao = :data_devolucao, id_usuario = :id_usuario, id_bicicleta = :id_bicicleta WHERE  = :';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':data_do_aluguel',$alugam->getDataDoAluguel());

		$consulta->bindValue(':qtnd_tempo',$alugam->getQtndTempo());

		$consulta->bindValue(':data_devolucao',$alugam->getDataDevolucao());

		$consulta->bindValue(':id_usuario',$alugam->getIdUsuario());

		$consulta->bindValue(':id_bicicleta',$alugam->getIdBicicleta());
		if($consulta->execute())
			return true;
		else
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		include("../Connection/conexao.php");
		$sql = 'DELETE FROM alugam';
		$consulta = $conexao->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
}
?>

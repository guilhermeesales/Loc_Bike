<?php
	/* @Autor: Dalker Pinheiro
	   Classe DAO */

	class BicicletaDAO{
		//Carrega um elemento pela chave primária
		public function carregar($id){
			include("../Connection/conexao.php");
			$sql = 'SELECT * FROM bicicleta WHERE id = :id';
			$consulta = $conexao->prepare($sql);
			$consulta->bindValue(":id", $id);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		public function produtosRelacionados($id) {
			include("../Connection/conexao.php");
			$sql = 'SELECT * FROM bicicleta WHERE id <> :id';
			$consulta = $conexao->prepare($sql);
			$consulta->bindValue(":id", $id);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		//Lista todos os elementos da tabela
		public function listarTodos(){
			include("../Connection/conexao.php");
			$sql = 'SELECT * FROM bicicleta';
			$consulta = $conexao->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}
		
		//Lista todos os elementos da tabela listando ordenados por uma coluna específica
		public function listarPorPesquisa($variavel){
			include("../Connection/conexao.php");
			$sql = "SELECT * FROM bicicleta WHERE nome_modelo LIKE '%$variavel%'";
			$consulta = $conexao->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}
		
		//Apaga um elemento da tabela
		public function deletar($id){
			include("../Connection/conexao.php");
			$sql = 'DELETE FROM bicicleta WHERE id = :id';
			$consulta = $conexao->prepare($sql);
			$consulta->bindValue(":id",$id);
			if($consulta->execute())
				return true;
			else
				return false;
		}
		
		//Insere um elemento na tabela
		public function inserir($bicicleta){
			include("../Connection/conexao.php");
			$sql = 'INSERT INTO bicicleta (id, nome_modelo, preco, foto, descricao) VALUES (:id, :nome_modelo, :preco, :foto, :descricao)';
			$consulta = $conexao->prepare($sql);
			$consulta->bindValue(':id', $bicicleta->getId()); 

			$consulta->bindValue(':nome_modelo', $bicicleta->getNomeModelo()); 

			$consulta->bindValue(':preco', $bicicleta->getPreco()); 

			$consulta->bindValue(':foto', $bicicleta->getFoto()); 

			$consulta->bindValue(':descricao', $bicicleta->getDescricao()); 
			
			if($consulta->execute())
				return true;
			else
				return false;
		}
		
		//Atualiza um elemento na tabela
		public function atualizar($bicicleta){
			include("../Connection/conexao.php");
			$sql = 'UPDATE bicicleta SET id = :id, nome_modelo = :nome_modelo, preco = :preco, foto = :foto, descricao = :descricao WHERE id = :id';
			$consulta = $conexao->prepare($sql);
			$consulta->bindValue(':id',$bicicleta->getId()); 

			$consulta->bindValue(':nome_modelo',$bicicleta->getNomeModelo()); 

			$consulta->bindValue(':preco',$bicicleta->getPreco()); 

			$consulta->bindValue(':foto',$bicicleta->getFoto()); 

			$consulta->bindValue(':descricao',$bicicleta->getDescricao()); 
			if($consulta->execute())
				return true;
			else
				return false;
		}

		//Apaga todos os elementos da tabela
		public function limparTabela(){
			include("../Connection/conexao.php");
			$sql = 'DELETE FROM bicicleta';
			$consulta = $conexao->prepare($sql);
			if($consulta->execute())
				return true;
			else
				return false;
		}
	}
?>
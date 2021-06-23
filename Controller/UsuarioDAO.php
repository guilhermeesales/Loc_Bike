<?php

	/* @Autor: Dalker Pinheiro
	   Classe DAO */
	   
class UsuarioDAO{

	public function carregarPorId($id) {
		include("../Connection/conexao.php");
		$sql = 'SELECT * FROM usuario WHERE id = :id';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":id", $id);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}


	//Carrega um elemento pelo email e senha
	public function carregar($email, $password){
		include("../Connection/conexao.php");
		$sql = 'SELECT * FROM usuario WHERE email = :email and senha = :senha';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":email", $email);
		$consulta->bindValue(":senha", $password);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		include("../Connection/conexao.php");
		$sql = 'SELECT * FROM usuario';
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrdenandoPor($coluna){
		include("../Connection/conexao.php");
		$sql = 'SELECT * FROM usuario ORDER BY '.$coluna;
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($id){
		include("../Connection/conexao.php");
		$sql = 'DELETE FROM usuario WHERE id = :id';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":id",$id);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function inserir($user){
		include("../Connection/conexao.php");
		$sql = 'INSERT INTO usuario (id, nome_completo, email, senha, foto, data_nascimento, cpf, endereco_e_numero, bairro, cidade) VALUES (:id, :nome_completo, :email, :senha, :foto, :data_nascimento, :cpf, :endereco_e_numero, :bairro, :cidade)';
		$consulta = $conexao->prepare($sql);
		
		$consulta->bindValue(':id',$user->getId()); 

		$consulta->bindValue(':nome_completo',$user->getNomeCompleto()); 

		$consulta->bindValue(':email',$user->getEmail()); 

		$consulta->bindValue(':senha',$user->getSenha()); 

		$consulta->bindValue(':foto',$user->getFoto()); 

		$consulta->bindValue(':data_nascimento',$user->getDataNascimento()); 

		$consulta->bindValue(':cpf',$user->getCpf()); 

		$consulta->bindValue(':endereco_e_numero',$user->getEnderecoENumero()); 
		
		$consulta->bindValue(':bairro', $user->getBairro());

		$consulta->bindValue(':cidade', $user->getCidade());

		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Atualiza um elemento na tabela
	public function atualizar($user, $id){
		include("../Connection/conexao.php");
		$sql = 'UPDATE usuario SET nome_completo = :nome_completo, email = :email, data_nascimento = :data_nascimento WHERE id = :id';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':id', $user->getId()); 

		$consulta->bindValue(':nome_completo',$user->getNomeCompleto()); 

		$consulta->bindValue(':email',$user->getEmail()); 

		$consulta->bindValue(':data_nascimento',$user->getDataNascimento()); 

		$consulta->bindValue(':id', $id);

		if($consulta->execute())
			return true;
		else
			return false;
	}

}
?>
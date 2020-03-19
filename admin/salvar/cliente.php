<?php

	if ( $_POST ) {
	
		if ( isset ( $_POST["id"] ) ) {
			$id = trim ( $_POST["id"] );
		}
		if ( isset ( $_POST["nome"] ) ){
			$nome = trim ( $_POST["nome"] );
		}
		if ( isset ( $_POST["data"] ) ) {
			$data = trim ( $_POST["data"] );
		}
		if ( isset ( $_POST["sexo"] ) ) {
			$sexo = trim ( $_POST["sexo"] );
		}
		if ( isset ( $_POST["cpf"] ) ) {
			$cpf = trim ( $_POST["cpf"] );
		}
		/*var_dump($_POST);
		echo $cpf;*/
	
				//validar se nao existe nenhum tipo decliente com o cpf que sera inserido 
		if(empty ($id) ){
			$sql = "select id from cliente where cpf = ? limit 1";
			$consulta = $pdo->prepare($sql);
			$consulta->bindParam(1,$cpf);

		}else{
			$sql ="select id from cliente where nome = ? and id <> ? limit 1";
			$consulta = $pdo->prepare($sql);
			$consulta->bindParam(1,$nome);
			$consulta->bindParam(2,$id);  
		}
		$consulta->execute();
		$dados = $consulta->fetch(PDO::FETCH_OBJ);

		//verificar se o $dados trouxe algum resultado
		if(isset($dados->id)){
			$msg="Já existe um cliente cadastrado com o cpf: $cpf cadastrado na sua base de dados";
			mensagem($msg);
		}
		$data = formataData( $data );
		if (empty ($id)){

			$sql = "insert into cliente (nome, nacimento, sexo, cpf)
			values(?,?,?,?)";
			$consulta = $pdo->prepare($sql);
			$consulta->bindParam(1,$nome);
            $consulta->bindParam(2,$data);
            $consulta->bindParam(3,$sexo);
            $consulta->bindParam(4,$cpf); 
		}else{

			$sql = "update cliente set nome = ?, nacimento = ?, sexo = ?, cpf = ? where id = ?";

			$consulta = $pdo->prepare($sql);
			$consulta->bindParam(1,$nome);
            $consulta->bindParam(2,$data);
            $consulta->bindParam(3,$sexo);
            $consulta->bindParam(4,$cpf);
			$consulta->bindParam(5,$id);
		}


		if($consulta->execute()){
			$msg = "registro inserido com sucesso!";
			$link = "cadastro/calculo";
        	sucesso($msg, $link);
		}else{
			$msg ="Erro ao inserir/atualizar registro !";
			mensagem($msg);
		}

 	}else{
		//erro
		$msg = "Erro ao efetuar requisição";
		mensagem($msg);
	}

?>
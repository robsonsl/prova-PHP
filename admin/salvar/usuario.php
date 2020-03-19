<?php
	
if($_POST){
		if(isset($_POST["id"])){
			$id 	= trim($_POST["id"]);
		}
		if (isset($_POST["nome"])) {
			$nome 	= trim($_POST["nome"]); 
		}
		if (isset($_POST["email"])) {
			$email 	= trim($_POST["email"]);
        }
        if (isset($_POST["login"])) {
			$login 	= trim($_POST["login"]);	
		}
		if (isset($_POST["senha"])) {
			$senha 	= trim($_POST["senha"]);	
        }
        if (isset($_POST["ativo"])) {
			$ativo 	= trim($_POST["ativo"]);	
		}
		if (isset($_POST["empresa_id"])) {
			$empresa_id 	= trim($_POST["empresa_id"]);	
        }
        
      
        $senha = password_hash($senha, PASSWORD_DEFAULT);
		
		if(empty($id)){
			$sql = "insert into funcionario (id, nome, email, login, senha, ativo, empresa_id) values(?,?,?,?,?,?,?)";
			$consulta = $pdo->prepare($sql);
			$consulta->bindParam(1,$id);
            $consulta->bindParam(2,$nome);
			$consulta->bindParam(3,$email);
			$consulta->bindParam(4,$login);
            $consulta->bindParam(5,$senha);
			$consulta->bindParam(6,$ativo);
			$consulta->bindParam(7,$empresa_id);
				
			

		}else{
			$sql = "update funcionario set nome = ?, email = ?, login = ?, senha = ?, ativo = ?, empresa_id = ? where id = ?";
			$consulta = $pdo->prepare($sql);
			$consulta->bindParam(1,$nome);
            $consulta->bindParam(2,$email);
            $consulta->bindParam(3,$login);
            $consulta->bindParam(4,$senha);
			$consulta->bindParam(5,$ativo);
			$consulta->bindParam(6,$empresa_id);
			$consulta->bindParam(7,$id);

			
		}
		if($consulta->execute()){
			$msg = "registro inserido com sucesso!";
			$link = "listar/usuario";
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
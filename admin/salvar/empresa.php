<?php

if($_POST){
		if(isset($_POST["id"])){
			$id 	= trim($_POST["id"]);
		}
		if (isset($_POST["nome"])) {
			$nome 	= trim($_POST["nome"]); 
		}
        if (isset($_POST["cnpj"])) {
			$cnpj 	= trim($_POST["cnpj"]);	
		}
		if (isset($_POST["tipo_id"])) {
			$tipo_id 	= trim($_POST["tipo_id"]);	
        }
		if(empty($id)){
			$sql = "insert into empresa (nome, cnpj, tipoempresa_id) values(?,?,?)";
			$consulta = $pdo->prepare($sql);
            $consulta->bindParam(1,$nome);
			$consulta->bindParam(2,$cnpj);
            $consulta->bindParam(3,$tipo_id);
           
		}else{
			$sql = "update empresa set nome = ?, cnpj = ?, tipoempresa_id = ? where id = ?";
			$consulta = $pdo->prepare($sql);
            $consulta->bindParam(1,$nome);
			$consulta->bindParam(2,$cnpj);
            $consulta->bindParam(3,$tipo_id);
            $consulta->bindParam(4,$id);
		
		}
		if($consulta->execute()){
			$msg = "registro inserido com sucesso!";
			$link = "listar/empresa";
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
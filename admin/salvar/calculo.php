<?php

	if($_POST){
      
		    $peso=$altura=$funcionario=$cliente=$imc=$data='';
        foreach ($_POST as $key => $value) {
			
			//$key - nome do campo
            //$value - valor do campo (digitado)
           // echo"<p>$key $value</P>";
			if(isset($_POST[$key])){
				$$key  = trim($value);
			} 
		}
		$imc = $peso/($altura*$altura);
		if ( $imc < 18.5 ){
			$cls = "Abaixo do peso";
		}else if( $imc < 25.0 ){
			$cls = "Peso normal";
		}else if( $imc < 30.0 ){
			$cls = "Sobrepeso";
		}else if( $imc < 35.5 ){
			$cls = "Obeso Leve";
		}else if( $imc < 40.0 ){
			$cls = "Obeso Moderado";
		}else{
			$cls = "Obeso Mórbido";
		}


		$data = formataData( $data );
		if(empty($id)){
        
      		$sql = "insert into avaliacao (id, peso, altura, imc, data, classificacao, cliente_id, funcionario_id) values (NULL, :peso, :altura, :imc, :data, :cls ,:cliente_id, :funcionario_id)";
      		$consulta = $pdo->prepare($sql);

      		$consulta->bindValue(":peso",$peso);
      		$consulta->bindValue(":altura",$altura);
      		$consulta->bindValue(":imc",$imc);
      		$consulta->bindValue(":data",$data);
      		$consulta->bindValue(":cls",$cls);
      		$consulta->bindValue(":cliente_id",$cliente);
      		$consulta->bindValue(":funcionario_id",$funcionario);
		}
		
       
		if($consulta->execute()){
			$msg = "registro inserido com sucesso!";
			$link = "listar/avaliacao";
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
	
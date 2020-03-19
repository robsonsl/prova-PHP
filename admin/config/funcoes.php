<?php

	function formataValor( $valor ) {
		//receber 5.000,00 -> 5000,00
		$valor = str_replace(".", "", $valor);
		//5000,00 -> 5000.00
		$valor = str_replace(",", ".", $valor);
		return $valor;
	}

	/*
	funcao para transformar data
	*/

	function formataData( $data ) {
		//receber 10/02/2019 -> 2019-02-10
		$data = explode("/", $data);

		//0 - dia, 1 - mes, 2 - ano

		//verificar se não for válido
		if ( !checkdate($data[1], $data[0], $data[2]) ) {
			$msg = "Data inválida";
			mensagem( $msg );
		}

		//montar a data com -
		$data = $data[2]."-".$data[1]."-".$data[0];

		return $data;
	}

	function mensagem($msg) {
		//alert - funcao javascript para mostrar uma mensagem em pop up
		//history.back() retornar a página anterior
		echo "<script>alert('$msg');history.back();</script>";
		exit;
	}

	function sucesso($msg, $link) {

		echo "<script>alert('$msg');location.href='$link';</script>";
		exit;

	}

	function carregarOpcoes($tabela,$campo,$pdo){

		$sql = "select id, $campo as nome from $tabela order by 1 ";
		$consulta = $pdo->prepare($sql);
		$consulta->execute();

		while ($dados = $consulta->fetch(PDO::FETCH_OBJ) ) {

			//recuperar as variaveis
			$id = $dados->id;
			$nome = $dados->nome;
			//o id vai ser gravado no banco, e o nome será exibido na tela como opção
			echo "<option value='$id'>$nome</option>";
			
		}

	}

		function validaCPF($cpf) {
	 
	    // Extrai somente os números
	    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
	     
	    // Verifica se foi informado todos os digitos corretamente
	    if (strlen($cpf) != 11) {
	        return "O CPF precisa ter ao menos 11 números";
	    }
	    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
	    if (preg_match('/(\d)\1{10}/', $cpf)) {
	        return "CPF inválido";
	    }
	    // Faz o calculo para validar o CPF
	    for ($t = 9; $t < 11; $t++) {
	        for ($d = 0, $c = 0; $c < $t; $c++) {
	            $d += $cpf{$c} * (($t + 1) - $c);
	        }
	        $d = ((10 * $d) % 11) % 10;
	        if ($cpf{$c} != $d) {
	            return "CPF inválido";
	        }
	    }
	    return true;
	}

	function validaCNPJ($cnpj) {
	    $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
	    // Valida tamanho
	    if (strlen($cnpj) != 14)
	        return "CNPJ precisa ter ao menos 14 números";
	    // Valida primeiro dígito verificador
	    for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
	    {
	        $soma += $cnpj{$i} * $j;
	        $j = ($j == 2) ? 9 : $j - 1;
	    }
	    $resto = $soma % 11;
	    if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
	        return "CNPJ inválido";
	    // Valida segundo dígito verificador
	    for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
	    {
	        $soma += $cnpj{$i} * $j;
	        $j = ($j == 2) ? 9 : $j - 1;
	    }
	    $resto = $soma % 11;
	    return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
	}
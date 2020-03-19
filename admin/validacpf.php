<?php

	//incluir o arquivo da funcao
	include "config/funcoes.php";

	$cpf = "";
	if ( isset (  $_GET["cpf"] ) )
		$cpf = trim ( $_GET["cpf"] );

	//verificar se o cpf esta em branco
	if ( empty ( $cpf ) ) {
		echo "Forneça um CPF";
		exit;
	}else if ( $cpf == "123.456.789-09" ){
		echo "CPF invalido";
		exit;
	}

	//exeutar a funcao
	echo validaCPF( $cpf );

?>
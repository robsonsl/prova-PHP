<?php
	//iniciar a sessao
	session_start();

	//configurar para serem mostrados os erros do php
	ini_set("display_error",1);
	ini_set("display_startup_errors",1);
	error_reporting(E_ALL);

	//incluir a conexao com o banco e as funcoes
	include "config/conexao.php";
	include "config/funcoes.php";

?>

<!DOCTYPE html>
<html lang="pr-BR">
<head>
	<title>Calculo de IMC</title>
	<meta sharset="utf-8">

</head>
<body>

		<base href="http://<?=$_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME']?>">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
	<link rel="stylesheet" type="text/css" href="css/summernote.min.css">
	<link rel="stylesheet" type="text/css" href="css/summernote-bs4.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="shortcut icon" href="images/icone.png">

	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="Js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="js/jquery.flot.min.js"></script>
	<script type="text/javascript" src="js/lightbox.min.js"></script>
	<script type="text/javascript" src="js/parsley.min.js"></script>
	<script type="text/javascript" src="js/summernote.min.js"></script>
	<script type="text/javascript" src="js/summernote-bs4.min.js"></script>
	<script type="text/javascript" src="js/jasny-bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.maskMoney.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/datepicker-pt-BR.js"></script>

	<script type="text/javascript" src="lang/summernote-pt-BR.min.js"></script>

</body>
</html>

<?php

	/*if ( !isset ( $_SESSION["imc"]["id"] ) ){
		include 'pagina/login.php';
	}else {*/


	$pagina = "pagina/home";

	if ( isset ( $_GET["param"] ) ) {

		$pagina = trim ( $_GET["param"] );

	}

	$p= explode ("/", $pagina);

	$pasta = $p[0];
	$arquivo = $p[1];

	$pagina = "$pasta/$arquivo.php";

	include "main.php";

	
?>
<?php

  /*if ( file_exists ( "verificalogin.php" ) )
    include "verificalogin.php";
  else
    include "../verificalogin.php";*/

  $id = $nome = $data = $sexo = $cpf = "";

  if ( isset ( $p[2] ) ){
    $id = $p[2];

    $sql = "select *, date_format(nacimento, '%d/%m/%Y') nacimento from cliente where id = ? limit 1";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(1, $id);
    $consulta->execute();

    $daods = $consulta->fetch(PDO::FETC_OBJ);

    $nome                =$dados->nome;
    $data                =$dados->data;
    $sexo                =$dados->sexo;
    $Cpf                 =$dados->cpf;
  

  }

?>

<div class="container">

    <div class="text-center">
      <h1>Cadastro de Cliente</h1>
    </div>
   
	<br>
	<form name="cadastro" method="post" action="salvar/cliente" enctype="multipart/form-data"
    data-parsley-validate>
  		<div class="form-row">
    		<div class="form-group col-md-6">
      			<label for="nome">Nome</label>
      			<input type="text" class="form-control" name="nome" value="<?=$nome;?>" placeholder="Digite seu nome">
    		</div>
    		<div class="form-group col-md-6">
      			<label for="data">Data-Nacimento</label>
      			<input type="text" class="form-control" name="data" value="<?=$data;?>" placeholder="Preencha este campo" data-mask="99/99/9999">
    		</div>
        <br>
        <div class="form-group col-md-6">
            <label for="sexo">Sexo</label>
            <input type="text" class="form-control" name="sexo" value="<?=$sexo;?>" placeholder="Seleciona o sexo">
        </div>
         <div class="form-group col-md-6">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" data-mask="999.999.999-99" name="cpf" value="<?=$cpf;?>" onblur="validaCpf( this.value )" placeholder="Digite seu CPF">
        </div>
      </div>

      <br>
      <button type="submit" class="btn btn-success">Salvar</button>
	</form>

</div>
<script type="text/javascript">
  function validaCpf( cpf ) {
    $.get( "validacpf.php",{cpf:cpf},function( dados ) {

      if ( dados != 1 ) {
        //mensagem de erro 
        alert( dados );
        //apagar o cpf 
        $("#cpf").val("");
      }

    })
  }
</script>
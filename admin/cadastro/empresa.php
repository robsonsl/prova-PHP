<?php

  $id = $nome = $cnpj = $tipo_id = "";



  //verifica  o id -p[2]
  if(isset($p[2] ) ) {
    $id = $p[2];
    //select para selecionar o registro 
    $sql = "select * from empresa where id = ? limit 1 ";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(1,$id);
    $consulta->execute();

    //separar os dados 
    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    $nome      = $dados->nome;
    $cnpj      = $dados->cnpj;
    $tipo_id   = $dados->tipoempresa_id;
  }

    
  
?>



<div class="container">

    <div class="text-center">
      <h1>Cadastro de Empresa</h1>
    </div>
     <br>
     <div class="float-right">
    

      <a href="listar/empresa" class="btn btn-info">
         Listar
      </a>
    </div>
	<br>
	<form name="cadastro" method="post" action="salvar/empresa" enctype="multipart/form-data"
    data-parsley-validate>
  		<div class="form-row">
         <div class="form-group col-md-6">
            <label for="id">ID</label>
            <input type="number" class="form-control" readonly name="id" value="<?=$id;?>">
        </div>
    		<div class="form-group col-md-6">
      			<label for="nome">Nome</label>
      			<input type="text" class="form-control" name="nome" value="<?=$nome;?>" placeholder="Digite seu nome">
    		</div>
         <div class="form-group col-md-6">
            <label for="cnpj">CNPJ</label>
            <input type="cnpj" class="form-control" data-mask="99.999.999/9999-99" name="cnpj" value="<?=$cnpj;?>" onblur="validaCnpj( this.value )" placeholder="Digite seu CPF">
        </div>
         <div class="form-group col-md-6">
            <label for="tipo_id">Tipo</label>
            <select name="tipo_id" id="tipo_id"
            class="form-control"
            required 
            data-parsley-required-message="Selecione uma opção">
            <option value="">Selecione</option>
            <?php
              //tabela para selecionar os dados
              $tabela = "tipoempresa";
              //nome do campo que será carregado
              $campo = "tipo_empresa";
              //função para buscar os tipos
              carregarOpcoes($tabela,$campo,$pdo);
              //$pdo - conexao com o banco de dados
              ?>
              </select>
              </div>
      </div>

      <br>
      <button type="submit" class="btn btn-success">Salvar</button>
	</form>

</div>
<script type="text/javascript">

  function validaCnpj( cnpj ) {
    $.get( "validacnpj.php",{cnpj:cnpj},function( dados ) {

      if ( dados != 1 ) {
        
        alert( dados );
        
        $("#cnpj").val("");
      }

    })
  }
  
  $(document).ready(function(){
    
    //selecionar o id da empresa
    $("#tipo").val(<?=$tipo;?>);
    
  })

</script>
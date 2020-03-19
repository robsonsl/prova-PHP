<?php

  $id = $peso = $altura =  $data = $funcionario = $cliente  = "";

  if(isset($p[2] ) ) {
    $id = $p[2];
    //select para selecionar o registro 
    $sql = "select * ,date_format(data, '%d/%m/%Y') data from avaliacao where id = ? limit 1 ";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(1,$id);
    $consulta->execute();

    //separar os dados 
    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    $peso              =$dados->peso;
    $altura            =$dados->altura;
    $data              =$dados->data;
    $funcionario       =$dados->funcionario_id;
    $Cliente           =$dados->cliente_id;
    $id                =$dados->id;
    

   
  }

  
?>


<div class="container">

    <div class="text-center">
      <h1>Calculo do IMC</h1>
    </div>
    <br>
     <div class="float-right">
    

      <a href="listar/avaliacao" class="btn btn-info">
         Listar
      </a>
    </div>
	<br>
	<form name="cadastro" method="post" action="salvar/calculo" enctype="multipart/form-data"
    data-parsley-validate>
  		<div class="form-row">
        <div class="form-group col-md-6">
            <label for="id">ID</label>
            <input type="number" class="form-control" readonly name="id" value="<?=$id;?>">
        </div>
    		<div class="form-group col-md-6">
      			<label for="peso">Peso</label>
      			<input type="text" class="form-control" name="peso" value="<?=$peso;?>" placeholder="Digite seu peso">
    		</div>
    		<div class="form-group col-md-6">
      			<label for="altura">Altura</label>
      			<input type="text" class="form-control" name="altura" data-mask="9.99" value="<?=$altura;?>" placeholder="Digite sua altura" >
    		</div>
        <div class="form-group col-md-6">
            <label for="data">Data</label>
            <input type="text" class="form-control" name="data" data-mask="99/99/9999" value="<?=$data;?>" placeholder="Digite sua altura" >
        </div>

      <div class="form-group col-md-6">
      <label for="funcionario">Funcionario</label>
      <select name="funcionario" id="funcionario" 
      class="form-control" required 
      data-parsley-required-message="Selecione uma opção">
        <option value="">Selecione</option>
        <?php
          $tabela = "funcionario";
          $campo  =  "nome";  
          carregarOpcoes($tabela,$campo,$pdo);
        ?>
      </select>

      <br>
        </div>
        <div class="form-group col-md-6">
            <label for="cliente">Cliente</label>
            <select name="cliente" id="cliente" 
            class="form-control" required 
            data-parsley-required-message="Selecione uma opção">
            <option value="">Selecione</option>
            <?php
            $tabela = "cliente";
            $campo  =  "nome";  
            carregarOpcoes($tabela,$campo,$pdo);
            ?>
            </select>
        </div>
      </div>

      <br>
      <button type="submit" name="enviar" class="btn btn-success">Calcula</button>
	</form>

</div>
<script type="text/javascript">
  
  $(document).ready(function(){
    
    //selecionar o id da empresa
    $("#funcionario").val(<?=$funcionario;?>);
    
  })

  $(document).ready(function(){
    
    //selecionar o id da empresa
    $("#cliente").val(<?=$cliente;?>);
    
  })

</script>
<?php

  $id = $nome = $email = $login = $senha = $ativo = $empresa_id = "";



  //verifica  o id -p[2]
  if(isset($p[2] ) ) {
    $id = $p[2];
    //select para selecionar o registro 
    $sql = "select * from funcionario where id = ? limit 1 ";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(1,$id);
    $consulta->execute();

    //separar os dados 
    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    $nome              =$dados->nome;
    $email             =$dados->email;
    $login             =$dados->login;
    $senha             =$dados->senha;
    $ativo             =$dados->ativo;
    $empresa_id        =$dados->empresa_id  ;
  }

?>


<div class="container">
  <div class="coluna">
    <h1 class="float-left">Cadastro de Usuário</h1>
    <br>
    <div class="float-right">
      <a href="listar/usuario" class="btn btn-info">
        Listar
      </a>
    </div>

    <div class="clearfix"></div>

    <form name="cadastro" method="post" action="salvar/usuario" data-parsley-validate>

      <label for="id">ID:</label>
      <input type="text" name="id" 
      class="form-control" readonly
      value="<?=$id;?>">

      <br>
      <label for="nome">Nome do usuário:</label>
      <input type="text" name="nome" required
      class="form-control"
      data-parsley-required-message="Preencha este campo"
      value="<?=$nome;?>">

            <br>
            <label for="email">Email:</label>
      <input type="email" name="email" required
      class="form-control"
      data-parsley-required-message="Preencha este campo"
      value="<?=$email;?>">
      

      <br>
      <label for="login">Login:</label>
      <input type="text" name="login" required
      class="form-control"
      data-parsley-required-message="Preencha este campo"
      value="<?=$login;?>">

      <br>
      <label for="senha">Senha:</label>
      <input type="password" name="senha" required
      class="form-control"
      data-parsley-required-message="Preencha este campo"
            value="<?=$senha;?>">

    <br>

      <label for="ativo">Situacao:</label>
      <br>
      <div class="form-check custom-control-inline">
          <input class="form-check-input" type="radio" name="ativo" id="ativo" value="s">
          <label class="form-check-label" for="s">
           Ativo
        </label>
      </div>
      <div class="form-check custom-control-inline">
          <input class="form-check-input" type="radio" name="ativo" id="ativo" value="n">
          <label class="form-check-label" for="n">
        Inativo
        </label>
      </div>
      
      <br>
      <br>
      <label for="empresa_id">Empresa:</label>
      <select name="empresa_id" id="empresa_id"
      class="form-control"
      required 
      data-parsley-required-message="Selecione uma opção">
        <option value="">Selecione</option>
        <?php
          //tabela para selecionar os dados
          $tabela = "empresa";
          //nome do campo que será carregado
          $campo = "nome";
          //função para buscar os tipos
          carregarOpcoes($tabela,$campo,$pdo);
          //$pdo - conexao com o banco de dados
        ?>
      </select>
            
      
      
            
            

      </div>
      
      

      

      <br>
      <button type="submit" class="btn btn-success">
         Gravar
      </button>

    </form>

  </div>
</div>
<script type="text/javascript">
  
  $(document).ready(function(){
    
    //selecionar o id da empresa
    $("#empresa").val(<?=$empresa;?>);
    
  })

</script>
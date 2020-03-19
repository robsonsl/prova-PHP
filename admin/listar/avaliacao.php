 <div class="container">
		<div class="coluna pr-5px">
			<h1 class="text-center">Listagem das Avaliações</h1>
				<br>
				<a href="cadastro/calculo" class="btn btn-success float-right    ">
			  Novo
			</a>
			
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<td width="5%">ID</td>
						<td width="13%">Cliente</td>
                        <td width="5%">Peso</td>
                        <td width="5%">Altura</td>
                        <td width="5%">IMC</td>
                        <td width="20%">Classificação</td>
                        <td width="15%">Funcionário</td>
                        <td width="10%">Data</td>
						<td>Opções</td>

					</tr>

				</thead>
				<tbody>
					<?php
					$sql = "select a.id, a.cliente_id as id_cliente, a.peso , a.altura, a.imc, a.data, a.classificacao,b.nome as nome_cliente, c.nome as nome_funcionario
							FROM
							avaliacao as a INNER JOIN cliente as b  on (a.cliente_id = b.id)
							INNER JOIN funcionario as c on (a.funcionario_id = c.id)";
					$consulta =$pdo->prepare( $sql);
					$consulta->execute();
					while($linha = $consulta->fetch(PDO::FETCH_OBJ)){
						$id 	        = $linha->id;
						$peso 			= $linha->peso;
                        $altura	        = $linha->altura;
                        $imc 			= $linha->imc;
                        $data 			= $linha->data;
                        $classificacao  = $linha->classificacao;
                        $nome_cliente   = $linha->nome_cliente;
                        $nome_funcionario = $linha->nome_funcionario;
						echo "<tr>
								<td>$id</>
								<td>$nome_cliente</>
                                <td>$peso</td>
                                <td>$altura</td>
                                <td>$imc</td>
                                <td>$classificacao</td>
                                <td>$nome_funcionario</>
                                <td>$data</td>

                                
								<td>
								
								<a href='javascript:excluir($id)'class='btn btn-danger m-0  ml-0 p-0'>
								Excluir
								</a>
								</td>
							</tr>
							";
					}

					?>
				</tbody>
			</table>
		</div>
	</div>
	<script type="text/javascript">
		function excluir(id) {
			if(confirm("Deseja mesmo excluir? Tem certeza?")){
				location.href = "excluir/avaliacao/"+id;
			}
		}
		$(document).ready( function () {
	    $('.table').DataTable( {
        "language": {
            "lengthMenu": "Mostrar _MENU_ resultados por página",
            "zeroRecords": "Nenhum registro encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrando de _MAX_ em um total de registros)",
            "search":"Buscar",
            "Previous":"Anterior"
        }
    });
	} );

       
		
	</script>
 <div class="container">
		<div class="coluna pr-5px">
			<h1 class="text-center">Listagem das Empresas
				<br>
				<a href="cadastro/empresa" class="btn btn-success float-right    ">
			  Novo
			</a>
			</h1>
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<td width="5%">ID</td>
                        <td width="20%">Nome da Empresa</td>
                        <td width="20%">Tipo</td>
                        <td width="25%">CNPJ</td>
						<td>Opções</td>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "select e.id, e.nome, e.tipoempresa_id as id_tipoempresa, e.cnpj, t.tipo_empresa as nome_empresa
							FROM
							empresa as e INNER JOIN tipoempresa as t  on (e.tipoempresa_id = t.id) ";
					$consulta =$pdo->prepare( $sql);
					$consulta->execute();
					while($linha = $consulta->fetch(PDO::FETCH_OBJ)){
						$id 	        = $linha->id;
						$nome 			= $linha->nome;
                        $nome_empresa	= $linha->nome_empresa;
                        $cnpj 			= $linha->cnpj;
                       
						echo "<tr>
								<td>$id</>
                                <td>$nome</td>
                                <td>$nome_empresa</td>
                                <td>$cnpj </td>
                                
                                
								<td>
								<a href='cadastro/empresa/$id'class='btn btn-success m-0 ml-3'>
								Editra
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
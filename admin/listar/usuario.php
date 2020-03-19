 <div class="container">
		<div class="coluna pr-5px">
			<h1 class="text-center">Listagem dos Usuarios
				<br>
				<a href="cadastro/usuario" class="btn btn-success float-right    ">
			  Novo
			</a>
			</h1>
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<td width="5%">ID</td>
                        <td width="15%">Nome</td>
                        <td width="20%">E-mail</td>
                        <td width="10%">Ativo</td>
						<td>Opções</td>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "select id, nome, email, ativo from funcionario order by id";
					$consulta =$pdo->prepare( $sql);
					$consulta->execute();
					while($linha = $consulta->fetch(PDO::FETCH_OBJ)){
						$id 	        = $linha->id;
						$nome 			= $linha->nome;
                        $email	        = $linha->email;
                       	$ativo			= $linha->ativo;
						echo "<tr>
								<td>$id</>
                                <td>$nome</td>
                                <td>$email</td>
                                <td>$ativo</td>
                                
                                
								<td>
								<a href='cadastro/usuario/$id'class='btn btn-success m-0 ml-3'>
								Editra
							
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
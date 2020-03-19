 <div class="container">
		<div class="coluna pr-5px">
			<h1 class="text-center">Listagem dos Clientes
				<br>
				<a href="cadastro/cliente" class="btn btn-success float-right    ">
			  Novo
			</a>
			</h1>
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<td width="5%">ID</td>
						<td width="13%">Nome</td>
                        <td width="30%">Data Nacimento</td>
                        <td width="20%">Sexo</td>
                        <td width="25%">CPF</td>
                        
						<td>Opções</td>

					</tr>

				</thead>
				<tbody>
					<?php
					$sql = "select id, nome, date_format(nacimento, '%d/%m/%Y') nacimento, sexo, cpf from cliente order by id";
					$consulta =$pdo->prepare( $sql);
					$consulta->execute();
					while($linha = $consulta->fetch(PDO::FETCH_OBJ)){
						$id 	        = $linha->id;
						$nome 			= $linha->nome;
                        $nacimento	        = $linha->nacimento;
                        $sexo 			= $linha->sexo;
                        $cpf 			= $linha->cpf;
                       
						echo "<tr>
								<td>$id</>
								<td>$nome</>
                                <td>$nacimento</td>
                                <td>$sexo</td>
                                <td>$cpf</td>
                               

                                
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
				location.href = "excluir/cliente/"+id;
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
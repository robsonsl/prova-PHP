<?php

	if ( !isset ( $pagina ) ){
		header("Location: index.php");
	}

?>
<header>
	
	<nav class="text-right bg-dark">

		<h1 class="nome ">Cauculo de IMc</h1>

		<ul class="nav justify-content-end">
		  
		  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cadastros
        </a>
      	  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item " href="cadastro/cliente">Cliente</a>
	          <a class="dropdown-item" href="cadastro/usuario">Usuario</a>
	          <a class="dropdown-item" href="cadastro/empresa">Empresa</a>
      	  </div>
      	  </li>
      	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Processo
        </a>
      	  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="cadastro/calculo">Calculo</a>
      	  </div>
      	  </li>
      	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Listagens
        </a>
      	  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="listar/avaliacao">Avaliação</a>
	           <a class="dropdown-item" href="listar/cliente">Cliente</a>
	          <a class="dropdown-item" href="listar/usuario">Usuario</a>
	          <a class="dropdown-item" href="listar/empresa">Empresa</a>
      	  </div>
      	  </li>
		</ul>
	</nav>

	<main>

	<div class="container">
		<?php

			if ( file_exists ( $pagina ) ) include $pagina;
			else include "erro.php";

		?>
	</div>

	
</main>

</header>
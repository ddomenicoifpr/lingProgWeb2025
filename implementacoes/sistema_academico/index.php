<?php
//Inclusão do HTML do header
include_once(__DIR__ . "/view/include/header.php");
?>

<div class="row mt-3 justify-content-center">
	<div class="col-3">
		<div class="card text-center">
			<img class="card-image-top mx-auto"
					src="" 
					style="max-width: 200px; height: auto;" />
	
			<div class="card-body">
            	<h5 class="card-title">Alunos</h5>
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<a href="" 
						class="card-link">
						Listagem de Alunos</a>
				</li>
			</ul>
		</div>
	</div>

	<div class="col-3">
		<div class="card text-center">
			<img class="card-image-top mx-auto"
					src="" 
					style="max-width: 200px; height: auto;" />
	
			<div class="card-body">
            	<h5 class="card-title">Turmas</h5>
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<a href="" 
						class="card-link">
						Listagem de Turmas</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<?php
include_once(__DIR__ . "/view/include/footer.php"); 
?>   
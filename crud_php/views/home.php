<header>
	<h1 class="title_page">Lista de Tarefas</h1>	
</header>

<section>
	<div class="d-flex justify-content-end">
		<a href="<?php echo BASE_URL; ?>Form">
			<button type="button" class="btn btn-success" id="btn-add">Adicionar</button>
		</a>	
	</div>

	<div class="d-flex justify-content-center">
		<table class="table table-striped table-light">
		  <thead>
		    <tr>
		      <th scope="col">Nome</th>
		      <th scope="col">Sobrenome</th>
		      <th scope="col">Tarefas</th>
		      <th scope="col">Data de Início</th>
		      <th scope="col">Data de Fim</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php foreach($tar as $TarItem): ?>
		    <tr>
        		<td><?php echo $TarItem['nome']; ?></td>
            	<td><?php echo $TarItem['sobrenome']; ?></td>
            	<td><?php echo $TarItem['tarefa']; ?></td>
            	<td><?php echo date('d/m/Y', strtotime($TarItem['dataInicio'])); ?></td>
            	<td><?php echo date('d/m/Y', strtotime($TarItem['dataFim'])); ?></td>
        		<td>
        			<div class="btn-group">
						<a href="<?php echo BASE_URL.'Form/edit/'.$TarItem['id']; ?>" class="btn 
							btn-primary">Editar</a>
						<a href="<?php echo BASE_URL.'Form/del/'.$TarItem['id']; ?>" class="btn 
							btn-danger">Excluir</a>
					</div>
        		</td>
        	</tr>
		    <?php endforeach; ?>
		  </tbody>
		</table>
	</div>
</section>
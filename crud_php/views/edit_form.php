<header class="hd">
	<h1 class="title_page_cad">Cadastro de tarefas</h1>	
</header>

<section>
	<div>
		<form id="tarefasFormUpdate" method="POST" 
		action="<?php echo BASE_URL; ?>Form/edit/<?php echo $id; ?>">
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputName">Nome</label>
		      <input type="text" class="form-control" id="inputName" name="nome" placeholder="Nome"
		      value="<?php if(!empty($nome)){ echo $nome;} ?>" />
		    </div>
		    <div class="form-group col-md-6">
		      <label for="inputSobrenome">Sobrenome</label>
		      <input type="text" class="form-control" id="inputSobrenome" name="sobrenome" placeholder="Sobrenome"  value="<?php if(!empty($sobrenome)){ echo $sobrenome;} ?>" /> 
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label for="textareaTarefa">Digite sua Tarefa</label>
   			<textarea class="form-control" id="textareaTarefa" name="tarefa" rows="3" placeholder="Exemplo ir ao supermercado..."><?php if(!empty($tarefa)){ echo trim($tarefa);} ?></textarea>
		  </div>
		  
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputInicio">Data de Início</label>
		      <input type="date" class="form-control" id="inputInicio" name="dataInicio"
		       value="<?php if(!empty($dataInicio)){ echo $dataInicio;} ?>" />
		    </div>
		    <div class="form-group col-md-6">
		      <label for="inputFim">Data do Fim</label>
		      <input type="date" class="form-control" id="inputFim" name="dataFim" 
		      value="<?php if(!empty($dataFim)){ echo $dataFim;} ?>" />
		    </div>
		  </div>
		  
		  <div class="d-flex justify-content-center" >
			<input type="submit" class="btn btn-primary" id="btn-save"  value="Salvar" />
			<a href="<?php echo BASE_URL; ?>">
				<button type="button" class="btn btn-info" id="btn-back">Voltar</button>
			</a>
		  </div>

		  <?php if(isset($error_name) && !empty($error_name)): ?>
				<div class="alert alert-danger alert-dismissible alert-style fade show">
					 <button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo $error_name; ?>
				</div>
		  <?php endif; ?>

		   <?php if(isset($error_sobrenome) && !empty($error_sobrenome)): ?>
				<div class="alert alert-danger alert-dismissible alert-style fade show">
					 <button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo $error_sobrenome; ?>
				</div>
		  <?php endif; ?>	

		   <?php if(isset($error_tarefa) && !empty($error_tarefa)): ?>
				<div class="alert alert-danger alert-dismissible alert-style fade show">
					 <button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo $error_tarefa; ?>
				</div>
		  <?php endif; ?>	

		   <?php if(isset($error_data) && !empty($error_data)): ?>
				<div class="alert alert-danger alert-dismissible alert-style fade show">
					 <button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo $error_data; ?>
				</div>
		  <?php endif; ?>

		  <?php if(isset($error_data_time) && !empty($error_data_time)): ?>
				<div class="alert alert-warning alert-dismissible alert-style fade show">
					 <button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo $error_data_time; ?>
				</div>
		  <?php endif; ?>

		  <?php if(isset($data_save_ok) && !empty($data_save_ok)): ?>
				<div class="alert alert-success alert-dismissible alert-style fade show">
					 <button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo $data_save_ok; ?>
				</div>
		  <?php endif; ?>

		</form>
	</div>
</section>
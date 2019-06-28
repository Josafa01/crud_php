<?php
class FormController extends Controller {

	public function index() {
		$dados = array(
			'error' => ''
		);

		if(!empty($_POST['nome']) && !empty($_POST['sobrenome']) && !empty($_POST['tarefa']) &&
			!empty($_POST['dataInicio']) && !empty($_POST['dataFim'])) {
			
			$nome = filter_var($_POST['nome'] , FILTER_SANITIZE_SPECIAL_CHARS);
			$sobrenome = filter_var($_POST['sobrenome'] , FILTER_SANITIZE_SPECIAL_CHARS);
			$tarefa = filter_var($_POST['tarefa'] , FILTER_SANITIZE_SPECIAL_CHARS);
			$dataInicio = htmlentities($_POST['dataInicio']);
			$dataFim = htmlentities($_POST['dataFim']);

			$tarefaBean = new tarefaBean();	
		
			if(!$this->findNumInt($nome) && !$this->findNumFloat($nome) && 
			preg_match('/^[a-zA-Z]+/', $nome)) {

			$tarefaBean->setNome($nome);

			} else {
				$dados['error_name'] = 'falha no nome';
			}

			if(!$this->findNumInt($sobrenome) && !$this->findNumFloat($sobrenome) && 
				preg_match('/^[a-zA-Z]+/', $sobrenome)) {

				$tarefaBean->setSobrenome($sobrenome);

			} else {
				$dados['error_sobrenome'] = 'CAMPO SOBRENOME INCORRETO';
			}

			if($this->pontuation($tarefa) && preg_match('/^[a-zA-Z0-9]+/', $tarefa)) {
				$tarefaBean->setTarefa($tarefa);
			} else {
				$dados['error_tarefa'] = 'CAMPO TAREFA INCORRETO';
			}

			if($this->dateCheckIni($dataInicio) && $this->dateCheckFim($dataFim)) {
				$tarefaBean->setDataInicio($dataInicio);
				$tarefaBean->setDataFim($dataFim);
			} else {
				$dados['error_data'] = 'PREENCHA OS CAMPOS DE DATA CORRETAMENTE';
			}

			$dataInicio = $tarefaBean->getDataInicio();
			$dataFim = $tarefaBean->getDataFim();
			$intervalo = strtotime($dataFim) - strtotime($dataInicio);
			$dias = floor($intervalo / (60 * 60 * 24));

			if($dias > 0) {
				$tarefas = new tarefas();
				$tarefas->add($tarefaBean->getNome(), 
				$tarefaBean->getSobrenome(), 
				$tarefaBean->getTarefa(), 
				$tarefaBean->getDataInicio(), 
				$tarefaBean->getDataFim());

				$dados['data_save_ok'] = 'Dados salvos com sucesso!';
			
			} else {
				$dados['error_data_time'] = 'PREENCHA OS CAMPOS DE DATA CORRETAMENTE';
			}

		} 

		$this->loadTemplate('form', $dados);
	}

	public function edit($id) {
		$dados = array();

		$tarefas = new tarefas();
		$dados = $tarefas->get($id);

		if(!empty($_POST['nome']) && !empty($_POST['sobrenome']) && !empty($_POST['tarefa']) &&
			!empty($_POST['dataInicio']) && !empty($_POST['dataFim']) && !empty($id)) {
			
			$nome = filter_var($_POST['nome'] , FILTER_SANITIZE_SPECIAL_CHARS);
			$sobrenome = filter_var($_POST['sobrenome'] , FILTER_SANITIZE_SPECIAL_CHARS);
			$tarefa = filter_var($_POST['tarefa'] , FILTER_SANITIZE_SPECIAL_CHARS);
			$dataInicio = htmlentities($_POST['dataInicio']);
			$dataFim = htmlentities($_POST['dataFim']);

			$tarefaBean = new tarefaBean();	

			if($this->findNumInt($id)) {
				$tarefaBean->setID($id);
			} else {
				header("Location: ".BASE_URL);
				exit;
			}
			
		
			if(!$this->findNumInt($nome) && !$this->findNumFloat($nome) && 
				preg_match('/^[a-zA-Z]+/', $nome)) {

				$tarefaBean->setNome($nome);
			
			} else {
				$dados['error_name'] = 'falha no nome';

			}

			if(!$this->findNumInt($sobrenome) && !$this->findNumFloat($sobrenome) && 
				preg_match('/^[a-zA-Z]+/', $sobrenome)) {

				$tarefaBean->setSobrenome($sobrenome);

			} else {
				$dados['error_sobrenome'] = 'CAMPO SOBRENOME INCORRETO';
			}

			if($this->pontuation($tarefa) && preg_match('/^[a-zA-Z0-9]+/', $tarefa)) {
				$tarefaBean->setTarefa($tarefa);
			} else {
				$dados['error_tarefa'] = 'CAMPO TAREFA INCORRETO';
			}

			if($this->dateCheckIni($dataInicio) && $this->dateCheckFim($dataFim)) {
				$tarefaBean->setDataInicio($dataInicio);
				$tarefaBean->setDataFim($dataFim);
			} else {
				$dados['error_data'] = 'PREENCHA OS CAMPOS DE DATA CORRETAMENTE';
			}

			$dataInicio = $tarefaBean->getDataInicio();
			$dataFim = $tarefaBean->getDataFim();
			$intervalo = strtotime($dataFim) - strtotime($dataInicio);
			$dias = floor($intervalo / (60 * 60 * 24));

			if($dias > 0 && empty($dados['error_name']) && empty($dados['error_sobrenome']) &&
			empty($dados['error_tarefa']) && empty($dados['error_data'])) {
				
				$tarefas = new tarefas();
				$tarefas->update($tarefaBean->getID(),
				$tarefaBean->getNome(), 
				$tarefaBean->getSobrenome(), 
				$tarefaBean->getTarefa(), 
				$tarefaBean->getDataInicio(), 
				$tarefaBean->getDataFim());

				header("Location:".BASE_URL);
			
			} else {
				$dados['error_data_time'] = 'PREENCHA OS CAMPOS DE DATA CORRETAMENTE';
			}

		} 
	
		$this->loadTemplate('edit_form', $dados);
	}

	public function del($id) {
		
		if(!empty($id) && $this->findNumInt($id)) {
			
			$tarefas = new tarefas();
			$tarefas->delete($id);
		}


		header("Location: ".BASE_URL);
		exit;
	}

	private function findNumInt($var) {
		return (filter_var($var, FILTER_SANITIZE_NUMBER_INT) === '' ? false : true);
	}

	private function findNumFloat($var) {
		return (filter_var($var, FILTER_SANITIZE_NUMBER_FLOAT) === '' ? false : true);
	}

	private function pontuation($var) {
		return preg_replace('/^[[:punct:]]+$/', '',  $var) ? true : false;
	}

	private function dateCheckIni($var) {
		return DateTime::createFromFormat('Y-m-d', $var);
	}

	private function dateCheckFim($var) {
		return DateTime::createFromFormat('Y-m-d', $var);
	}

}



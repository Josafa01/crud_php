<?php 
class tarefaBean
{
	private $id;
	private $nome;
	private $sobrenome;
	private $tarefa;
	private $dataInicio;
	private $dataFim;

	public function getID() {
		return $this->id;
	}

	public function setID($id) {
		$this->id = $id;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function getSobrenome() {
		return $this->sobrenome;
	}

	public function setSobrenome($sobrenome) {
		$this->sobrenome = $sobrenome;
	}	

	public function getTarefa() {
		return $this->tarefa;
	}

	public function setTarefa($tarefa) {
		$this->tarefa = $tarefa;
	}	

	public function getDataInicio() {
		return $this->dataInicio;
	}

	public function setDataInicio($dataInicio) {
		$this->dataInicio = $dataInicio;
	}	

	public function getDataFim() {
		return $this->dataFim;
	}

	public function setDataFim($dataFim) {
		$this->dataFim = $dataFim;
	}	

}
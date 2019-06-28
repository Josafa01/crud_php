<?php
class HomeController extends Controller {

	public function index() {
		$dados = array();

		$tarefas = new tarefas();
		$dados['tar'] = $tarefas->get_all();

		$this->loadTemplate('home', $dados);
	}

}
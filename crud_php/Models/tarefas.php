<?php
class tarefas extends Model
{
	
	public function add($nome, $sobrenome, $tarefa, $dataInicio, $dataFim) {

		$tarefa = trim($tarefa);

		$sql = "INSERT INTO usuario (nome, sobrenome, tarefa, dataInicio, dataFim) VALUES (:nome, :sobrenome, :tarefa, :dataInicio, :dataFim)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':sobrenome', $sobrenome);
		$sql->bindValue(':tarefa', $tarefa);
		$sql->bindValue(':dataInicio', $dataInicio);
		$sql->bindValue(':dataFim', $dataFim);
		$sql->execute();
	}

	public function get_all() {
		$array = array();
		
		$sql = "SELECT * FROM usuario";
		$sql = $this->db->query($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function get($id) {
		$array = array();

		$sql = "SELECT * FROM usuario WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetch(\PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function update($id, $nome, $sobrenome, $tarefa, $dataInicio, $dataFim) {
			
		$tarefa = trim($tarefa);

		if ($this->cheack_id($id)) {
			$sql = "UPDATE usuario SET nome = :nome, sobrenome = :sobrenome, tarefa = :tarefa, dataInicio = :dataInicio, dataFim = :dataFim WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':nome', $nome);
			$sql->bindValue(':sobrenome', $sobrenome);
			$sql->bindValue(':tarefa', $tarefa);
			$sql->bindValue(':dataInicio', $dataInicio);
			$sql->bindValue(':dataFim', $dataFim);
			$sql->bindValue(':id', $id);
			$sql->execute();
		} 
		
	}


	public function delete($id) {
		$sql = "DELETE FROM usuario WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}

	private function cheack_id($id) {
		$sql = "SELECT id FROM usuario WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

}
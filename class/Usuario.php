<?php

class Usuario{

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){
		return $this->idusuario;
	}
	public function setIdusuario($id){
		$this->idusuario = $id;
	}
	public function getDeslogin(){
		return $this->deslogin;
	}
	public function setDeslogin($login){
		$this->deslogin = $login;
	}
	public function getDessenha(){
		return $this->dessenha;
	}
	public function setDessenha($senha){
		$this->dessenha = $senha;
	}
	public function getDtcadastro(){
		return $this->dtcadastro;
	}
	public function setDtcadastro($dataCadastro){
		$this->dtcadastro = $dataCadastro;
	}

	public function loadById($id){
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :id", array(
			":id"=>$id
		));

		if(count($results) > 0){
			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		}
	}

	public function __toString(){
		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDesenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")

		));
	}

}
?>
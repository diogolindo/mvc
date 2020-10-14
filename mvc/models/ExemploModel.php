<?php
class ExemploModel extends MainModel
{


	public function teste(){
		$sql="SELECT * FROM usuario";

		$retorno=$this->db->query($sql, null);
		While($item=$retorno->fetch(PDO::FETCH_ASSOC)){
			$resultado[]=$item;
		}
		return $resultado;
	}


	public function select($id=null){
		if($id){
			$where['id']=$id;
		}else{
			$where=null;
		}

		return $this->db->select("aluno", null, $where);
		
	}

	public function select2(){
		$cols[0]='teste';
		$result=$this->db->select("usuario", $cols, null);
		return $result;
	}
	
	public function select3(){
		$cols[]='id';
		$cols[]='nome';
		$cols[]='matricula';
		$where['id'][]=3;
		$result=$this->db->select("aluno", $cols, $where);
		return $result;
	}

	public function selectOr(){
		$cols[]='id';
		$cols[]='nome';
		$where['id'][]=29;
		$where['id'][]=0;
		$result=$this->db->select("aluno", $cols, $where, "or");
		return $result;
	}

	public function insert($data_array=null){
		
		$array[0]['nome']="Richard Parker";
		$array[0]['email']="ripa@gmail.com";
		$array[0]['senha']="45b45c21a0cdd1479235e69c936a09e6";

		$array[1]['nome']="James Bond";
		$array[1]['email']="jabo@gmail.com";
		$array[1]['senha']="45b45c21a0cdd1479235e69c936a09e6";

		return $resultado=$this->db->insert("usuario",$array);
	}
}
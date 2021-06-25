<?php
	include ('conexao.php');
    session_start();


 class Painel {
     public static function logado(){
         return isset($_SESSION['login']) ? true : false;
     }

     	public static function alert($tipo,$messagem){
		if($tipo =='sucesso'){
			echo '<div class="box-alert sucesso">'.$messagem.'</div>';
		}else if ($tipo == 'erro'){
			echo '<div class="box-alert erro">'.$messagem.'</div>';
		}
    }
    public static function userExists($uname,$password){
			$sql = Conexao::conectar()->prepare("SELECT * FROM patrimonio_web.tb_user WHERE user=? AND password=?");
			$sql->execute(array($uname,$password));
			if($sql->rowCount() == 1)
				return true;
			else
				return false;
		}

   // Função para ser usando como Select para qualquer tabela
	public static function selectAll(){
			$sql = Conexao::conectar()->prepare("SELECT numero_patrimonio, descricao, numero_serie, service_tag, marca, modelo, id_localizacao, last_update,localizacao,localizacao.id
	FROM app.patrimonio_old RIGHT JOIN app.localizacao ON id_localizacao = localizacao.id" );
			$sql->execute();
			return $sql->fetchALL();

		}
		
		//Função para Cadastrar Usuários
      public static function cadastrarUser($uname, $senha){
		$sql = Conexao::conectar()->prepare('INSERT INTO patrimonio_web.tb_user("user",password) VALUES (?,?)');
		$sql->execute(array($uname, $senha));
	}
		//Função para Cadastrar Equipamentos
		public static function cadastrarEquip($patrimonio,$descricao,$nserie,$service,$marca,$modelo,$nsala,$data){
		$sql = Conexao::conectar()->prepare("INSERT INTO app.patrimonio_old (numero_patrimonio,descricao,numero_serie,service_tag,marca,modelo,id_localizacao,last_update) VALUES (?,?,?,?,?,?,?,?)");
		$sql->execute(array($patrimonio,$descricao,$nserie,$service,$marca,$modelo, $nsala,$data));
	}

		//Atualizando Item
		public static function updateEquip($patrimonio,$descricao,$nserie,$service,$marca,$modelo,$nsala,$data,$id,$inativo,$observacao){
		$sql = Conexao::conectar()->prepare("UPDATE app.patrimonio_old SET numero_patrimonio = ?, descricao = ?,numero_serie = ?, service_tag = ?,marca = ?,modelo = ?,id_localizacao = ?,last_update = ?, inativo = ?, observacao = ?  WHERE id=$id ");
		$sql->execute(array($patrimonio,$descricao,$nserie,$service,$marca,$modelo, $nsala,$data,$inativo,$observacao));
	}

	//Atualizando Item
	public static function selectPatrimonio($patrimonio){
		$sql = Conexao::conectar()->prepare("SELECT numero_patrimonio FROM app.patrimonio_old WHERE numero_patrimonio = $patrimonio ");
		$sql->execute(array($patrimonio));
	}
		
	}
 

?>
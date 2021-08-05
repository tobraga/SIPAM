<?php

require_once('conexao.php');

session_start();


$salaOrigi = $_GET['salaOrigi'];
$id_mov = $_GET['id_mov'];
//$salaDest = $_GET['salaDest'];
$salaDestino = $_GET['salaDestino'];
$date = date("d-m-Y");
$user = $_SESSION['uname'];
$dados = $_GET['dados'];

for ($i=0; $i < count($dados) ; $i++) { 
      echo $dados[$i]['idpatrimonio'];
} 


    



$insertDadosMov = Conexao::Conectar()->prepare("INSERT INTO app.dados_mov (sala_origem, sala_destino, data_mov, usuario_mov) 
VALUES ($salaOrigi, $salaDestino,  '$date', '$user')");
$insertDadosMov->execute();


$ultimoID = Conexao::Conectar()->prepare("SELECT max(id_dados_mov) from app.dados_mov");
$ultimoID->execute();
$ultimoID = $ultimoID->fetch();
$ultimo_id = intval("$ultimoID[0]");
    


    
$resultadoBasico = Conexao::Conectar()->prepare("INSERT INTO app.item_mov (dados_mov_id, patrimonio_id)
 VALUES ($ultimo_id,:idpatrimonio)");
 for ($i=0; $i < count($dados) ; $i++) { 
print_r($dados[$i]);
$resultadoBasico->execute($dados[$i]);
}

/*
$resultadoBasico->execute( array(':lng1' => $lng1, ':lat1' => $lat1, ':lng2' => $lng2, ':lat2' => $lat2) );
$resultadoBasico = $resultadoBasico->fetchAll(PDO::FETCH_CLASS);
echo json_encode($resultadoBasico);





$consulta = Conexao::conectar()->prepare("SELECT  id 
       FROM app.patrimonio_old where numero_patrimonio = '$npatrimonio' ");
        $consulta->execute();
        $consulta = $consulta->fetch();
        $id_patrimonio = intval("$consulta[0]");
*/
?>
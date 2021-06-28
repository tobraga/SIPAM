<?php

require_once('conexao.php');

$npatrimonio = $_GET['npatrimonio'];
$salaOrigi = $_GET['salaOrigi'];

$resultadoBasico = Conexao::Conectar()->prepare("	INSERT INTO app.itens_mov (dados_mov_id, patrimonio_id) VALUES ('$npatrimonio','$salaOrigi');
	");

	$resultadoBasico->execute();




?>

/*
$resultadoBasico = Conexao::Conectar()->prepare("	SELECT numero_patrimonio, descricao, marca, modelo, id_localizacao
	FROM app.patrimonio_old WHERE '$npatrimonio' = numero_patrimonio AND '$salaOrigi' = id_localizacao
	");

	$resultadoBasico->execute();

/*$resultadoBasico->execute( array(':lng1' => $lng1, ':lat1' => $lat1, ':lng2' => $lng2, ':lat2' => $lat2) );
$resultadoBasico = $resultadoBasico->fetchAll(PDO::FETCH_CLASS);
echo json_encode($resultadoBasico);
*/
?>
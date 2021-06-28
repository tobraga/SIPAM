<?php

require_once('conexao.php');
session_start();

$npatrimonio = $_GET['npatrimonio'];
$salaOrigi = $_GET['salaOrigi'];
$salaDest = $_GET['salaDest'];
//$salaDestino = $_POST['nsalaDest'];
$date = date("d-m-Y");
$user = $_SESSION['uname'];

$resultado = Conexao::Conectar()->prepare("	INSERT INTO app.dados_mov (id_dados_mov, sala_origem, sala_destino, data_mov, usuario_mov, status_mov) VALUES ('1','$salaOrigi', '$salaDest', '$date', '$user', 'pendente');
	");

	$resultado->execute();


$resultadoBasico = Conexao::Conectar()->prepare("	INSERT INTO app.itens_mov (dados_mov_id, patrimonio_id) VALUES ('$npatrimonio','$salaOrigi');
	");

	$resultadoBasico->execute();


?>


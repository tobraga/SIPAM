

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Equipamento</title>
    <link rel="stylesheet" href="../css/cadastrar.css">
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
    
</head>
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="main.php"> << Retornar</a>
</nav>
<style>
h1{
  padding-top: 20px;
text-align: center 
}
form{

  padding-right: 80px;
  padding-left: 50px;

}

.box-alert{
	width: 100%;
	padding:8px 0;
	text-align: center;
}

.sucesso{
	background: #a5d6a7;
	color: white;
}

.erro{
	background: #F75353;
	color: white;
}
</style>
<body>
<h1>Cadastrar Equipamentos</h1>
    <form method="post">
    <?php
include ('../config/painel.php');


if (isset($_POST['acao'])) {
    $patrimonio = $_POST['patrimonio'];
    $descricao = $_POST['descricao'];
    $nserie = $_POST['nserie']; 
    $service = $_POST['service']; 
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $sala = $_POST['sala'];
    $sala = (explode(' - ',$sala,3));
  $nsala = $sala[0];
   $data = date('Y/m/d');

    
   $gravar = new Painel();
	$gravar->cadastrarEquip($patrimonio,$descricao,$nserie,$service,$marca,$modelo,$nsala,$data);
  Painel::alert('sucesso',' cadastro realizado com sucesso!');

}
?>
 <div class="form-group">
    <label for="descricao">Patrimônio:</label>
    <input type="text" class="form-control" id="patrimonio" name="patrimonio" aria-describedby="descricaoHelp" placeholder="Patrimonio do Equipamento" >
  </div>
  <div class="form-group">
    <label for="descricao">Descrição:</label>
    <input type="text" class="form-control" id="descricao" name="descricao" aria-describedby="descricaoHelp" placeholder="Descrição do Equipamento" >
  </div>
  <div class="form-group">
    <label for="marca">Número de Série:</label>
    <input type="text" class="form-control" id="marca" name="nserie"placeholder=" Número de Série do Equipamento" >
  </div>
  <div class="form-group">
    <label for="marca">Service_Tag:</label>
    <input type="text" class="form-control" id="marca" name="service"placeholder="Service_Tag do Equipamento" >
  </div>
  <div class="form-group">
    <label for="marca">Marca:</label>
    <input type="text" class="form-control" id="marca" name="marca"placeholder="Marca do Equipamento" >
  </div>
  <div class="form-group">
    <label for="modelo">Modelo:</label>
    <input type="text" class="form-control" id="marca" name="modelo"placeholder="Modelo do Equipamento" >
  </div>


  <div class="form-group">
    <label for="marca">Sala:</label>
    <select name="sala" id="sala" class="form-control" >
      <option seleted disable value="">-- Selecionar Sala --</option>
      <?php  
        $consultaSala = Conexao::conectar()->prepare("SELECT id|| ' - '||localizacao as localizacao FROM app.localizacao;");
        $consultaSala->execute();
        $consultaSala = $consultaSala->fetchAll();
        foreach( $consultaSala as $consultaSala){
          ?>
      	<option value="<?php echo $consultaSala ['localizacao'] ;?>">
						<?php echo $consultaSala ['localizacao']; ?>

					</option>
       <?php }?>

    </select>
  </div>
  
  
  

  <button type="submit" class="btn btn-primary" name='acao'>Enviar</button>
</form>

<?php
die();

?>

<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
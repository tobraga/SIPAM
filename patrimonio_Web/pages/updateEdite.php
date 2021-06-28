

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando Equipamentos</title>
    <link rel="stylesheet" href="../css/cadastrar.css">
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
    
</head>
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="editar.php"> << Retornar</a>
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
<h1>Editando Equipamentos</h1>
    <form method="post">
    <?php
include ('../config/painel.php');

  $id = (!empty($_GET['id']) ? $_GET['id'] : '');

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
  // $data = date('d/m/y') ;
   $observacao = $_POST['obs'];


if(isset($_POST['inativo']))
{
       $inativo = "true";
}
else
{
    $inativo = "false";
}
$updateItem = Painel::updateEquip($patrimonio,$descricao,$nserie,$service,$marca,$modelo,$nsala,$id,$inativo,$observacao);
Painel::alert('sucesso','Item atualizado com sucesso!');


}

    $editando = Conexao::conectar()->prepare("SELECT * FROM app.patrimonio_old WHERE id = $id");
    $editando->execute();
    $editando = $editando->fetchAll();


?>
<?php foreach($editando as $consulta){

        ?>
<div class="form-group">
    <label for="patrimonio">Patrimônio</label>
    <input type="text" class="form-control" id="patrimonio" name="patrimonio" aria-describedby="patrimonioHelp" placeholder="Patrimônio do Equipamento" value="<?php echo $consulta ['numero_patrimonio'];?>">
  </div>
  <div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao" aria-describedby="descricaoHelp" placeholder="Descrição do Equipamento" value="<?php echo $consulta ['descricao'];?>">
  </div>
  <div class="form-group">
    <label for="nserie">Número de Série</label>
    <input type="text" class="form-control" id="nserie" name="nserie"placeholder=" Número de Série do Equipamento" value="<?php echo $consulta ['numero_serie'];?>"  >
  </div>
  <div class="form-group">
    <label for="service">Service_Tag</label>
    <input type="text" class="form-control" id="service" name="service"placeholder="Service_Tag do Equipamento" value="<?php echo $consulta ['service_tag'];?>" >
  </div>
  <div class="form-group">
    <label for="marca">Marca</label>
    <input type="text" class="form-control" id="marca" name="marca"placeholder="Marca do Equipamento" value="<?php echo $consulta ['marca'];?>">
  </div>
  <div class="form-group">
    <label for="modelo">Modelo</label>
    <input type="text" class="form-control" id="modelo" name="modelo"placeholder="Modelo do Equipamento" value="<?php echo $consulta ['modelo'];?>" >
  </div>
    

     <div class="form-group">
    <label for="marca">Sala:</label>
    <select name="sala" id="sala" class="form-control" >
      <option  value="<?php echo $consulta ['id_localizacao'];?>"><?php echo $consulta ['id_localizacao'];?></option>
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
  <div class="custom-control custom-checkbox">
  <?php if($consulta ['inativo'] == "true") {?>
  <input type="checkbox" class="custom-control-input" id="defaultChecked2" name="inativo" value="inativo" checked >
  <?php }else{?>
  <input type="checkbox" class="custom-control-input" id="defaultChecked2" name="inativo" value="inativo"  >

  <?php }?>
  <label class="custom-control-label" for="defaultChecked2" >Inativo</label>
</div>
   <div class="form-group">
  <label for="obs">Observação:</label>
  <textarea class="form-control" rows="5" id="observacao" name="obs" placeholder="Digite uma observação em caso de Inativo" ><?php echo $consulta ['observacao'];?></textarea>
</div> 
<?php }?>
  <button type="submit" class="btn btn-danger" name='acao'>Atualizar</button>
</form>

<?php
die();

?>

<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>


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
    $observacao = $_POST['observacao'];

    if (isset($_POST['inativo'])) {
    $inativo = "true";
  }else {
   $inativo="false";
    }





    $sala = (explode(' - ',$sala,3));
    $nsala = $sala[0];
    $data = date('d/m/y') ;

    $updateItem = Painel::updateEquip($patrimonio,$descricao,$nserie,$service,$marca,$modelo,$nsala,$data,$id,$inativo,$observacao);
    Painel::alert('sucesso','Item atualizado com sucesso!');


}

    $editando = Conexao::conectar()->prepare("SELECT   * FROM app.patrimonio_old WHERE id = $id");
    $editando->execute();
    $editando = $editando->fetchAll();


?>
<?php foreach($editando as $consulta){

        ?>
<div class="form-group">
    <label for="descricao">Patrimônio</label>
    <input type="text" class="form-control" id="patrimonio" name="patrimonio" aria-describedby="patrimonioHelp" placeholder="Patrimônio do Equipamento" value="<?php echo $consulta ['numero_patrimonio'];?>">
  </div>
  <div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao" aria-describedby="descricaoHelp" placeholder="Descrição do Equipamento" value="<?php echo $consulta ['descricao'];?>">
  </div>
  <div class="form-group">
    <label for="marca">Número de Série</label>
    <input type="text" class="form-control" id="marca" name="nserie"placeholder=" Número de Série do Equipamento" value="<?php echo $consulta ['numero_serie'];?>"  >
  </div>
  <div class="form-group">
    <label for="marca">Service_Tag</label>
    <input type="text" class="form-control" id="marca" name="service"placeholder="Service_Tag do Equipamento" value="<?php echo $consulta ['service_tag'];?>" >
  </div>
  <div class="form-group">
    <label for="marca">Marca</label>
    <input type="text" class="form-control" id="marca" name="marca"placeholder="Marca do Equipamento" value="<?php
    echo $consulta ['marca'];?>">
  </div>
  
  <div class="form-group">
    <label for="marca">Modelo</label>
    <input type="text" class="form-control" id="marca" name="modelo"placeholder="Marca do Equipamento" value="<?php 
    echo $consulta ['modelo'];?>" >
  </div>
 
  <div class="form-group">
    <label for="marca">Sala:</label>
  <select name="sala" id="sala" class="form-control" >
    <option  value="<?php echo $consulta ['id_localizacao'];?>"><?php
    echo $consulta ['id_localizacao'];?></option>
  </div>
  
    
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
       <?php }?>
    </select>
  
  
  </div>

  
  <div class="checkbox">

  <?php

if ($consulta ['inativo']==1){?>
   <label><input type="checkbox" checked name="inativo" > Inativo</label>
<?php }else{?>
   <label><input type="checkbox" name="inativo" > Inativo</label>
<?php }?>




          

</div>
<p><b> Observação:</b></p>
<textarea rows="04" cols="253" maxlength="500" name='observacao'><?php 
    echo $consulta ['observacao'];?></textarea>

  <button type="submit" class="btn btn-danger" name='acao'>Atualizar </button>

</form>

<?php
die();

?>

<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
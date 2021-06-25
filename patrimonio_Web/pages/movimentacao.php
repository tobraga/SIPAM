

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Equipamentos</title>
   <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
 

</head>
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="main.php"> << Retornar</a>
</nav>
<style>
tfoot input { 
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
     #example_wrapper {
        padding: 15px;
    }
    .navbar{
        background-color: black;
        color: white;
    }
     .navbar a{
        color: white;
    }
    
    </style>
<body>
    <?php
    include ('../config/painel.php');
    if (isset($_POST['acao'])) {
    (string)$sala = $_POST['nsala'];
    
    $consulta = Conexao::conectar()->prepare("SELECT  numero_patrimonio,descricao,numero_serie,service_tag,marca,modelo,id_localizacao 
       FROM app.patrimonio_old where id_localizacao = '$sala' ");
        $consulta->execute();
        $consulta = $consulta->fetchAll();
       // print_r ($consulta);
       

}else{
  $consulta[] = null;
}
  
    if (isset($_POST['movimentar'])) {
    $salaDestino = $_POST['nsalaDest'];
    print_r($salaDestino);
    }

    ?>
    <form class="form-group" method="post">
   <section class="intro">
  <div class="bg-image h-100">
    <div class="mask d-flex align-items-center h-100" style="background-color: rgba(194, 185, 179, 0.2);">
      <div class="container">
        <div class="card" style="background-color: rgba(0,0,0,.7);">
          <div class="card-body p-4">
            <div class="row justify-content-center">
              <div class="col-lg-12 col-xl-10 d-lg-flex flex-row mb-lg-4 mb-xl-0">

                <div id="basic" class="form-outline form-white flex-fill me-lg-2 mb-3 mb-lg-0">
                  <input type="text" id="form1" class="form-control" name="nsala" placeholder="Digite nº da sala"/>
                </div>

                <div class="col-lg-12 col-xl-2">
                <input class="btn btn-primary btn-rounded btn-block" type="submit" value="Pesquisar" name="acao" />
              </div>

               <hr>

               

                <div id="location" class="form-outline form-white  ">
                 <select class="form-select" name="nsalaDest" >
                <option selected>Selecione a sala de Destino</option>
                 <?php
                 $consultaSala = Conexao::conectar()->prepare("SELECT id
	                  FROM app.localizacao_old order by id DESC; ");
                 $consultaSala->execute();
                  $consultaSala = $consultaSala->fetchAll();
                  foreach ($consultaSala as $key => $value){
                 ?>
                     <option value="<?php echo $value['id'];?>">
                     <?php echo $value['id'];?>
                     </option>
                <?php }?>
                </select>
                  </div>
                    <div class="col">
                <input class="btn btn-danger btn-rounded btn-block" type="submit" value="Movimentar" name="movimentar" />
              </div>

              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  
</form>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
              <th>selecione os Itens</th>
                <th>Patrimônio</th>
                <th>Descrição</th>
                <th>Número de Serie</th>
                <th>Service tag</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Sala</th>

               
            </tr>
        </thead>
        <tbody id="myTable">

            <?php foreach($consulta as $consulta){
               
                ?>
            <tr>
            <td><input type="checkbox"></td>
                <td><?php echo $consulta ['numero_patrimonio'];?></td>
                <td><?php echo $consulta ['descricao'];?></td>
                <td><?php echo $consulta ['numero_serie'];?></td>
                <td><?php echo $consulta ['service_tag'];?></td>
                <td><?php echo $consulta ['marca'];?></td>
                <td><?php echo $consulta ['modelo'];?></td>                
                <td><?php echo $consulta ['id_localizacao'];?></td>
            
                

                
            </tr>
            <?php }?>
          </tbody>   
         
          
    </table>


  <script src="../lib/jquery/js/jquery.min.js"></script>

<script>
</script>
 
  </body>












   
</script>
</body>
</html>
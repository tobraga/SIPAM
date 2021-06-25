

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Equipamentos</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="../lib/datatables/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../lib/datatables/css/fixedHeader.bootstrap.min.css">
  <link rel="stylesheet" href="../lib/datatables/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="../lib/datatables/css/buttons.dataTables.min.css">


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

    div.col-auto{
        float:left;
    }
    div.form-row-align-items-center{
        float:right;
        
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
       
}

    ?>
    <form class="form-group" method="post">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <label class="sr-only" for="inlineFormInput">Name</label>
        <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Digite a sala" name="nsala">
      </div>
      
      <div class="col">
        <button type="submit" class="btn btn-primary mb-2" name="acao">Pesquisar</button>
      </div>
      <br></br>
      <div class="col">
        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preferência</label>
        <select name="sala" id="sala" class="form-control">
          <option selected disable value="">--- Escolher Sala ---</option>
        
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
      
      
      <div class="col">
        <button type="submit" class="btn btn-primary">Transferir</button>
      </div>
    </div>
    </div>
    
    <hr>
    

  <form>


</form>



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
              $consulta[] = NULL;
            ?>
            
            <tr>
            <td><input type="checkbox" class="checkBox"></td>
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
  <script src="../lib/datatables/js/jquery.dataTables.min.js"></script>
  <script src="../lib/datatables/js/dataTables.bootstrap4.min.js"></script>
  <script src="../lib/datatables/js/dataTables.fixedHeader.min.js"></script>
  <script src="../lib/datatables/js/dataTables.responsive.min.js"></script>
  <script src="../lib/datatables/js/dataTables.colReorder.min.js"></script>
  <script src="../lib/datatables/js/buttons.colVis.min.js"></script>
  <script src="../lib/datatables/js/responsive.bootstrap.min.js"></script>
  <script src="../lib/datatables/js/dataTables.buttons.min.js"></script> 
  <script src="../lib/datatables/js/pdfmake.min.js"></script>
  <script src="../lib/datatables/js/pdfmake_vfs_fonts.js"></script>
  <script src="../lib/datatables/js/buttons.html5.min.js"></script> 
  <script src="../lib/datatables/js/buttons.print.min.js"></script>  



 
  </body>












   
</script>
</body>
</html>
<!DOCTYPE html>
<html lang="pt.br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <link rel="stylesheet" type="text/css" href="movimentacao.css" media="screen">


       
                           <title>Movimentar</title>

      <!--TESTE -->
      <link rel="stylesheet" href="../lib/datatables/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../lib/datatables/css/fixedHeader.bootstrap.min.css">
  <link rel="stylesheet" href="../lib/datatables/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="../lib/datatables/css/buttons.dataTables.min.css">

  </nav>

    <br>


  </head>
    
  <body>  
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="../index.php"> << Retornar </a>
    </nav>
    
    <br>        
    <div>
      <center><h2 id="titulo">Movimentar Patrimônio</h2></center>  
    </div>
                                                     <br/><br/><br/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <form>
          <div class="row">
          <div class="col">
            <div class="input-group">
                <input type="search" name="salaorigem" class="form-control rounded" placeholder="Search" aria-label="Search"
                  aria-describedby="search-addon" />
                <button type="button" name="pesquisa" class="btn btn-outline-primary">search</button>
                <i class="fas fa-search"></i>
            </div>
          </div>
          <div class="col">
            <input type="text" class="form-control" placeholder="Sala destino">
          </div>
        </div>
      </form>
  <br>

<!--CONEXAO AO BD -->
 <?php
    include ('../config/painel.php');

        $consulta = Painel::selectALL();
       
    ?>

        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
              <!--<th>x</th>-->
                <th>Patrimônio</th> 
                <th>Descrição</th>
                <th>Número de Serie</th>
            <!--<th>Service tag</th>--> 
                <th>Marca</th>
            <!--<th>Modelo</th>-->    
                <th>Sala</th>
            <!--<th>Ultima Atualização</th>-->    
                   <tfoot>
            </tr>
        </tfoot>
            </tr>
        </thead>
        
        <!--SELECAO DAS TABELAS DO BD -->
        <tbody id="myTable">
            <?php foreach($consulta as $consulta){
                ?>
            

            <tr>
                <td><?php echo $consulta ['numero_patrimonio'];?></td>
                <td><?php echo $consulta ['descricao'];?></td>
                <td><?php echo $consulta ['numero_serie'];?></td>
                <td><?php echo $consulta ['marca'];?></td>
                <td><?php echo $consulta ['id_localizacao'];?></td>
                
                
            </tr>
            <?php }?>
          </tbody>


        </table>
<button type="button" class="btn btn-outline-dark">transferir</button>
    

  </body>
  
</html>
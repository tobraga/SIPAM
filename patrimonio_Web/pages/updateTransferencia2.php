

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Equipamentos</title>
   <!-- <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap3.3.7.min.css">-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 
   <!-- Importando o jQuery -->
  
  <!-- Importando o js do bootstrap -->

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
    #example_wrapper{
        padding: 15px
    }
    .fa-edit{
        color: orange
    }
    .navbar-brand{
        background-color: #343a40 !important;
        color: white !important;
        width: 100%
    }

    </style>
<body>
<?php
    $id = '';
    include ('../config/painel.php');
    
        
        $consulta = Conexao::conectar()->prepare("SELECT id_dados_mov, usuario_mov, data_mov FROM app.dados_mov WHERE status_mov = 'pendente'");
        $consulta->execute();
        $consulta = $consulta->fetchAll();
       
    ?>
    <!--Criação da Tabela-->
    <table id="example" class="table  table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Patrimônio</th>
                <th>Usuário</th>
                <th>Data Movimentação</th>
                <th id="confirmar" >Confirmar Transferencia</th>
            </tr>
        </thead>
        <tbody id="myTable">
            <?php foreach($consulta as $consulta){
                $id = $consulta['id_dados_mov']
                ?>
            <tr>
                <td><?php echo $consulta ['id_dados_mov'];?></td>
                <td><?php echo $consulta ['usuario_mov'];?></td>
                <td><?php echo $consulta ['data_mov'];?></td>
                <td> <button type="button" class="btn btn-primary" name = "exampleModal" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $id; ?>">Aprovar</button></td>
            </tr>
            <?php }?>
          </tbody>   
         
          
    </table>




    <!--*******************************************************************************************************************************-->
    <?php
        
        $confirmaMov = Conexao::conectar()->prepare("SELECT id_dados_mov, dados_mov_id, sala_origem, sala_destino , data_mov,usuario_mov,numero_patrimonio,descricao,marca,modelo FROM app.dados_mov
        INNER JOIN app.item_mov ON id_dados_mov = dados_mov_id
        INNER JOIN app.patrimonio ON dados_mov_id = $id");
        
        $confirmaMov->execute();
        $confirmaMov = $confirmaMov->fetchAll();
       
    ?>
    




<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dados da Movimentação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <div class="row">
              <div class ="col">  
                <label for="recipient-name" class="col-form-label">Pedido:</label>
                <label id="recipient-name" class="pedido">Pedido</label>
              </div>
              <div class ="col">  
                <label for="recipient-name" class="col-form-label">Sala Origem:</label>
                <label id="recipient-name" class="salaO"> Sala Origem</label>
              </div>
            </div>
            <div class ="row">
              <div class ="col">    
                <label for="recipient-name" class="col-form-label">Sala Destino:</label>
                <label id="recipient-name" class="salaD"> Sala Destino</label>
              </div>  
              <div class ="col"> 
                <label for="recipient-name" class="col-form-label">Data:</label>
                <label id="recipient-name" class="data"> Data</label>
              <div>  
            </div>  
            
            <!--
            <input type="text" class="form-control" id="recipient-name">
            -->
          
          </div>
          <div class="form-group">
          
          <!-- 
          <label for="message-text" class="col-form-label">Message:</label>
          <textarea class="form-control" id="message-text"></textarea>
          -->
          <!--Criação da Tabela-->
          <table id="example" class="table  table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Patrimônio</th>
                <th>Usuário</th>
                <th>Data Movimentação</th>
                <th id="confirmar" >Confirmar Transferencia</th>
              </tr>
            </thead>
            <tbody id="myTable">
              <?php foreach($confirmaMov as $confirmaMov){
                $id = $confirmaMov['id_dados_mov']
              ?>
              <tr>
                <td><?php echo $confirmaMov ['numero_patrimonio'];?></td>
                <td><?php echo $confirmaMov ['descricao'];?></td>
                <td><?php echo $confirmaMov ['marca'];?></td>
                <td><?php echo $confirmaMov ['modelo'];?></td>
              </tr>
              <?php }?>
            </tbody>   
         
    </table>
          
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <script>

    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var salaO = button.data('whatever')
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Dados da Movimentação')
  modal.find('.modal-body input').val(salaO)
  modal.find('.modal-body .pedido').text(recipient)
  modal.find('.modal-body .salaO').text(recipient)
  modal.find('.modal-body .salaD').text(recipient)
  modal.find('.modal-body .data').text(recipient)
})
  </script>

</body>
</html>
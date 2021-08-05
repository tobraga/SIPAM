

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Equipamentos</title>
   <!-- <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap3.3.7.min.css">-->
   
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="../lib/datatables/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../lib/datatables/css/fixedHeader.bootstrap.min.css">
  <link rel="stylesheet" href="../lib/datatables/css/responsive.bootstrap.min.css">
   <!-- Importando o jQuery -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  <!-- Importando o js do bootstrap -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

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
    include ('../config/painel.php');

        $consulta = Conexao::conectar()->prepare("SELECT id_dados_mov, usuario_mov, data_mov FROM app.dados_mov WHERE status_mov = 'pendente'");
        $consulta->execute();
        $consulta = $consulta->fetchAll();
       
    ?>

    

<div id="MyModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Confirmar Transferencia</h5>
            
        </div>
        <div class= "modal-body">
            <p>Tabela do Modal</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
</div>


  <script src="../lib/jquery/js/jquery.min.js"></script>
  <script src="../lib/datatables/js/jquery.dataTables.min.js"></script>
  <script src="../lib/datatables/js/dataTables.bootstrap4.min.js"></script>
 <script src="../lib/datatables/js/dataTables.fixedHeader.min.js"></script>
 <script src="../lib/datatables/js/dataTables.responsive.min.js"></script>
 <script src="../lib/datatables/js/responsive.bootstrap.min.js"></script>

</body>
</html>
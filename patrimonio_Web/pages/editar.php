

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Equipamentos</title>
   <!-- <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap3.3.7.min.css">-->
   
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="../lib/datatables/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../lib/datatables/css/fixedHeader.bootstrap.min.css">
  <link rel="stylesheet" href="../lib/datatables/css/responsive.bootstrap.min.css">


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

        $consulta = Conexao::conectar()->prepare("SELECT   * FROM app.patrimonio_old ORDER BY id DESC");
        $consulta->execute();
        $consulta = $consulta->fetchAll();
        
    ?>
    <!--Criação da Tabela-->
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Patrimônio</th>
                <th>Descrição</th>
                <th>Número de Serie</th>
                <th>Service tag</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Sala</th>
                <th>Inativo</th>
                <th>Observacao</th>
                <th>Editar Item</th>
                 <tfoot>
            <tr>
                <th>patrimonio</th>
                <th>descricao</th>
                <th>numero serie</th>
                <th>service tag</th>
                <th>marca</th>
                <th>modelo</th>
                <th>Sala</th>
                <th>Inativo</th>
                <th>Observacao</th>       
               </tr>
               </tfoot>
               </tr>
              
              
                                            
                <th id="editar" >editar</th>
        </thead>
        
        
        
        <tbody id="myTable">
            <?php foreach($consulta as $consulta){
                $id = $consulta['id'];
                ?>
            <tr>
                <td><?php echo $consulta ['numero_patrimonio'];?></td>
                <td><?php echo $consulta ['descricao'];?></td>
                <td><?php echo $consulta ['numero_serie'];?></td>
                <td><?php echo $consulta ['service_tag'];?></td>
                <td><?php echo $consulta ['marca'];?></td>
                <td><?php echo $consulta ['modelo'];?></td>
                <td><?php echo $consulta ['id_localizacao'];?></td>
                <td><?php echo $consulta ['inativo'];?></td>
                <td><?php echo $consulta ['observacao'];?></td>
               <?php echo" <td><a href='updateEdite.php?id=$id'><i class='fas fa-edit'></i></a></td>" ?> 

               
            </tr>
            <?php }?>
          </tbody>   
          
            
    </table>

  
  
  <script src="../lib/jquery/js/jquery.min.js"></script>
  <script src="../lib/datatables/js/jquery.dataTables.min.js"></script>
  <script src="../lib/datatables/js/dataTables.bootstrap4.min.js"></script>
 <script src="../lib/datatables/js/dataTables.fixedHeader.min.js"></script>
 <script src="../lib/datatables/js/dataTables.responsive.min.js"></script>
 <script src="../lib/datatables/js/responsive.bootstrap.min.js"></script>
 
 


<script>

  $(document).ready(function() {
      document.getElementById("editar").style.visibility = "hidden";     
      $('#example').DataTable( {
        "order": [[ 7, "desc" ]],
            responsive: true,
       "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando página  _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(filtrado de _MAX_ registros no total )",
           "sSearch": "Pesquisar",
            "oPaginate": {
            "sFirst": "Primeiro",
            "sPrevious": "Anterior",
            "sNext": "Próximo",
            "sLast": "Último"
          }
        },
        
        //Função para a consulta do select
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value="">Selecione</option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );  
    
   
    
    
    });
/*$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});*/

   
</script>
</body>
</html>
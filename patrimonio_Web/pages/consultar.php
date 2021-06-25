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
  <a class="navbar-brand" href="../index.php"> << Retornar </a>
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

        $consulta = Painel::selectALL();
       
    ?>
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
                <th>Ultima Atualização</th>
                   <tfoot>
            <tr>
                <th>patrimonio</th>
                <th>descricao</th>
                <th>numero serie</th>
                <th>service tag</th>
                <th>marca</th>
                <th>modelo</th>
                <th>Sala</th>
                <th>editar</th>
            </tr>
        </tfoot>
               
            </tr>
        </thead>
        <tbody id="myTable">
            <?php foreach($consulta as $consulta){
                ?>
            <tr>
                <td><?php echo $consulta ['numero_patrimonio'];?></td>
                <td><?php echo $consulta ['descricao'];?></td>
                <td><?php echo $consulta ['numero_serie'];?></td>
                <td><?php echo $consulta ['service_tag'];?></td>
                <td><?php echo $consulta ['marca'];?></td>
                <td><?php echo $consulta ['modelo'];?></td>
                <td><?php echo $consulta ['id_localizacao'];?></td>
                <td><?php echo $consulta ['last_update'];?></td>

                
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
  <script src="../lib/datatables/js/dataTables.buttons.min.js"></script> 
  <script src="../lib/datatables/js/pdfmake.min.js"></script>
  <script src="../lib/datatables/js/pdfmake_vfs_fonts.js"></script>
  <script src="../lib/datatables/js/buttons.html5.min.js"></script> 
  <script src="../lib/datatables/js/buttons.print.min.js"></script>  



 
  </body>
<script>
    $(document).ready(function() {
    $('#example').DataTable( {
          dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print', 
        ],   
     
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
/*

    $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example thead tr').clone(true).appendTo( '#example thead' );
    $('#example thead tr:eq(0) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Pesquisar '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change clear', function () {
            if ( table.search() !== this.value ) {
                table
                    .column(i)
                    .search(this.value,true,false)
                    .draw();
            }
        } );
    } );











$(document).ready(function(){
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
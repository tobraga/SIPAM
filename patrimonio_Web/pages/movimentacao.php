

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
    select{
      height: 38px
    }
    
    </style>
<body>
    <?php
    session_start();

    include ('../config/painel.php');
    if (isset($_POST['acao'])) {
    (string)$sala = $_POST['nsalaOrigi'];
    
    $consulta = Conexao::conectar()->prepare("SELECT  numero_patrimonio,descricao,numero_serie,service_tag,marca,modelo,id_localizacao 
       FROM app.patrimonio_old where id_localizacao = '$sala' ");
        $consulta->execute();
        $consulta = $consulta->fetchAll();
       // print_r ($consulta);
       

}else{
  $consulta[] = null;
}
  

    ?>
    <form class="form-group" method="post" >
   <section class="intro">
  <div class="bg-image h-100">
    <div class="mask d-flex align-items-center h-100" style="background-color: rgba(194, 185, 179, 0.2);">
      <div class="container">
        <div class="card" style="background-color: rgba(0,0,0,.7);">
          <div class="card-body p-4">
            <div class="row justify-content-center">
              <div class="col-lg-12 col-xl-10 d-lg-flex flex-row mb-lg-4 mb-xl-0">

                <div id="basic" class="form-outline form-white flex-fill me-lg-2 mb-3 mb-lg-0">
                  <input type="text" id="form1" class="form-control" name="nsalaOrigi" placeholder="Digite a sala Origem"/>
                </div>

                <div class="col-lg-12 col-xl-2">
                <input class="btn btn-primary btn-rounded btn-block" type="submit" value="Pesquisar" name="acao" />
              </div>

               <hr>

               

                <div id="location" class="form-outline form-white  ">
                 <select class="form-select" name="nsalaDest" id="nsalaDest" >
                <option selected>Selecione a sala de Destino</option>
                 <?php
                 $consultaSala = Conexao::conectar()->prepare("SELECT id || ' - ' ||localizacao as id_sala, id
	FROM app.localizacao_old order by id DESC; ");
                 $consultaSala->execute();
                  $consultaSala = $consultaSala->fetchAll();
                  foreach ($consultaSala as $key => $value){
                 ?>
                     <option value="<?php echo $value['id'];?>">
                     <?php echo $value['id_sala'];?>
                     </option>
                <?php }?>
                </select>
                  </div>
                    <div class="col">
                    <button type="button" class="btn btn-danger" id="movimentar" >Danger</button>
             <!--   <input class="btn btn-danger btn-rounded btn-block" type="submit" value="Movimentar" name="movimentar" id="movimentar" />-->
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
                <td class="checkBox"><input type="checkbox"></td>
                <td class="npatrimonio"><?php echo $consulta ['numero_patrimonio'];?></td>
                <td class="descricao"><?php echo $consulta ['descricao'];?></td>
                <td class="nserie"><?php echo $consulta ['numero_serie'];?></td>
                <td class="nservice"><?php echo $consulta ['service_tag'];?></td>
                <td class="marca"><?php echo $consulta ['marca'];?></td>
                <td class="modelo"><?php echo $consulta ['modelo'];?></td>                
                <td class="salaOrigi"><?php echo $consulta ['id_localizacao'];?></td>
            
                

                
            </tr>
            <?php }?>
          </tbody>   
         
          
    </table>


  <script src="../lib/jquery/js/jquery.min.js"></script>

<script>


$(document).ready(function() {
      var npatrimonio, descricao, nserie, marca, modelo, salaOrigi, salaDestino;
      
      $("#nsalaDest").on('change', function(e){
        //salaDestino = $(this).val().slice(0, 3);
        salaDestino = $(this).val();
        //salaDestino = $(this).val().substr(0, 3);
        //salaDestino = $(this).val().replace(/[^0-9]/g,'');
      });

  $('#movimentar').click(function() {
    $('.checkBox input:checked').each(function() {
       
      npatrimonio = $(this).closest('tr').find('.npatrimonio').text();
     // descricao = $(this).closest('tr').find('.descricao').html();
     // nserie = $(this).closest('tr').find('.nserie').html();
     // nservice = $(this).closest('tr').find('.nservice').html();
     // marca = $(this).closest('tr').find('.marca').html();
     // modelo = $(this).closest('tr').find('.modelo').html();
      salaOrigi = $(this).closest('tr').find('.salaOrigi').text();
         console.log('ID:'+npatrimonio+'|salaOrigi:'+salaOrigi,+'|salaDestino:'+salaDestino);

                  //   alert('ID:'+npatrimonio+'|sala:'+salaOrigi);
                  $.ajax({
					url : "../config/movimentacaoBD.php",
					type : "GET",
                    dataType: 'json',
                 data:{npatrimonio: npatrimonio, salaOrigi: salaOrigi, salaDestino: salaDestino},
				success: function(){
                   
               //alert('Patrimonio:'+numero_patrimonio[0]+'|sala:'+salaOrigi[0]);
               //alert('Enviado com sucesso!');
               
              alert('Pedido de Movimentação Realizado com Sucesso!');
              window.location.href = "http://localhost/patrimonio_Web/pages/main.php";     
				},
        });
    })

      
      })

  })


</script>
</body>
</html>
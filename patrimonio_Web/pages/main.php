
<?php

    if (!isset($_SESSION['login']))
    {
        header("Location:../index.php");
    }
    

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Patrimônio Web CRBE</title>
  <link href="lib/font-awesome/css/all.css" rel="stylesheet" type="text/css">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css" type="text/css">

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="css/simple-sidebar.css" type="text/css">
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Patrimônio WEB</div>
      <div class="list-group list-group-flush">
        <a href="pages/cadastrar.php" class="list-group-item list-group-item-action bg-light" >Cadastrar Equipamentos</a>
        <a href="pages/editar.php" class="list-group-item list-group-item-action bg-light" > Editar Equipamentos</a>
        <a href="pages/consultar.php" class="list-group-item list-group-item-action bg-light">Consultar Equipamentos</a>
        <a href="pages/mov.php" class="list-group-item list-group-item-action bg-light">Movimentar Patrimônio</a>
        <a href="pages/movimentacao.php" class="list-group-item list-group-item-action bg-light">Movimentação</a>
        <a href="pages/movimentacao_(1).php" class="list-group-item list-group-item-action bg-light">Movimentacao_(1)</a>
       
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <a id="menu-toggle" href="#" ><i class="fa fa-bars fa-2x pt-2"></i></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
               <?php echo $_SESSION['uname']; ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="pages/logout.php">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <main id="painel">

          </main>
      </div>
      
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->



  <script src="lib/jquery/js/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
     function changePage(page) {
        let painel = $("#painel");
        painel.empty();
        painel.load(page + ".php");
      }
  </script>

</body>

</html>
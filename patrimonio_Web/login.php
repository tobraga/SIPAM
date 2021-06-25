
<?php

if (isset($_POST['acao'])) {
    $uname = $_POST['uname'];
    $senha = $_POST['senha'];

    $sql = Conexao::conectar()->prepare("SELECT * FROM patrimonio_web.tb_user WHERE tb_user.user = ? AND tb_user.password = ?");
  	$sql->execute(array($uname,$senha));
    if($sql->rowCount() == 1){
		//Logado com Sucesso;
		$_SESSION['login'] = true;
		$_SESSION['uname'] = $uname;
		$_SESSION['senha'] = $senha;
	
		header('Location: pages/main.php');
		die();
}else{
    echo "Usuário ou Senha incorreto";
    }
}

?>
<style>
a{
	color: white !important;
    text-decoration:none !important; 
 }
</style>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Patrimônio Web</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
                <h3 style="text-align: center">Login</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><img src="../img/marcasipam.svg" alt="" ></i></span>
                    </div>
				
			</div>
			<div class="card-body">
				<form  method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control validate" name="uname" placeholder="username" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="senha" class="form-control validate" placeholder="password" required>
					</div>
					<div class="form-group">
            <button type="submit" class="btn btn-success" name='acao'>logar</button>
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
				Sistema de Patrimônio Web do CRBE <br>
				<button  type="button" class="btn btn-outline-success"><a href="cadastro_usuario.php">Cadastrar-se</a></button>

				</div>
				
			</div>
		</div>
	</div>
</div>
</body>


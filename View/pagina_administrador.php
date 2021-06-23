
<?php 
  include_once("cabecalho.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Página admin</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/assets/css/login.css">
  <link href="css/assets/img/favicon.png" rel="icon">

</head>
<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title" style="text-align: center;">Espaço reservado ao admin</h1>
            <?php if(isset($_GET['cadastro']) && $_GET['cadastro'] == "sucesso") { ?>
                <p style="text-align: center" class="text-success">Cadastrado com sucesso!</p>

            <?php } else if(isset($_GET['cadastro']) && $_GET['cadastro'] == "erro") { ?>
                <p style="text-align: center" class="text-danger">Preencha todos os campos!</p>

            <?php } ?>
            <form action="upload.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="email">Modelo da bicicleta</label>
                <input type="text" name="modelo_bicicleta" id="" class="form-control" >
              </div>
              <div class="form-group">
                <label for="email">Foto</label>
                <input type="file" name="foto" id="" class="form-control" >
              </div>
              <div class="form-group mb-4">
                <label for="password">Descrição</label>
                <input type="text" name="desc" id="" class="form-control" >
              </div>
              <div class="form-group">
                <label for="email">Valor </label>
                <input type="number" name="valor" id="" class="form-control" >
              </div>

             <a href="#" style="text-decoration: none;"> <input name="Alterar dados" id="login" class="btn btn-block login-btn" type="submit" value="Adicionar dados">
             	</a>
            </form>
            
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="css/assets/images/imadm.png" alt="login image" class="login-img" id="img">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>


<?php 
  include_once("footer.php");

?>

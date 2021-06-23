<?php 
  session_start();
  include_once('login_cadastro.php');
  include_once('../Controller/UsuarioDAO.php');
  $usuarioDAO = new UsuarioDAO();

  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';
  $login_incorreto = false;

  
  if(!empty($email) && !empty($password)) {
    $password = sha1($password);
    $dados = $usuarioDAO->carregar($email, $password);
    
    if(count($dados) > 0) {
      $_SESSION['dados_pessoais'] = $dados;
      $_SESSION['isadmin'] = $dados[0]['isadmin'];
      $_SESSION['login'] = true;
      
      if($dados[0]['isadmin'] == 0) {
        header('Location: ../index.php');
      } else{
        header('Location: pagina_administrador.php');
      }

    } else {
      $login_incorreto = true;
      
    }
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Loc-Bike-Login</title>


  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/assets/css/login.css">
  <link rel="stylesheet" href="css/style.css">

</head>
<body>
  <header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex justify-content-between">

    <div class="" >
      <a href="../index.php"><img src="./img/logo.png" alt="" class="img-fluid" id="log"></a>
    </div>
    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto" href="../index.php">Voltar ao início</a></li>
        <li><a class="nav-link scrollto" href="./cadastro.php">Cadastre-se</a></li>          
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
  </div>
  </header>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Acesse sua conta</h1>
            <form method="POST">
              <div class="form-group">
                <label for="email">E-mail</label>
                <input value="<?= $email ?>" type="email" required="required" name="email" id="email" class="form-control">
              </div>
              <div class="form-group mb-4">
                <label for="password">Senha</label>
                <input type="password" required="required" name="password" id="password" class="form-control">
              </div>
              <input name="login" id="login" class="btn btn-block login-btn" type="submit" value="Login">
              <?php if($login_incorreto) { ?>
                <p class="text-danger text-center">Usuário ou senha incorretos</p>
              <?php } ?>
            </form>
            <a href="#!" class="forgot-password-link">Esqueceu sua senha?</a>
            <p class="login-wrapper-footer-text">Não possui uma conta? <span style="color: #ffca28;"><a href="./cadastro.php" class="text-reset">Registre-se</a></span></p>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="img/carrousel2.jpg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>

<?php include_once('footer.php'); ?>
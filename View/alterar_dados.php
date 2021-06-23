<?php 
  session_start();
  include_once('login_cadastro.php');
  include_once('../Controller/UsuarioDAO.php');
  include('../Model/Usuario.php');

  $usuarioDAO = new UsuarioDAO();  
  $id = isset($_SESSION['dados_pessoais'][0]['id']) ? $_SESSION['dados_pessoais'][0]['id'] : '';
  $dados = $usuarioDAO->carregarPorId($id);
  $new_name = isset($_POST['new_name']) ? $_POST['new_name'] : '';
  $new_email = isset($_POST['new_email']) ? $_POST['new_email'] : '';
  $password = isset($_POST['pass']) ? $_POST['pass'] : '';
  $confirm_password = isset($_POST['pass_confirm']) ? $_POST['pass_confirm'] : '';
  $born_date = isset($_POST['date']) ? $_POST['date'] : ''; 
  $base_password = $dados[0]['senha'];  


  if(!empty($new_name) && !empty($new_email) && !empty($password) && !empty($confirm_password)
  && !empty($born_date) && sha1($password) == $base_password && sha1($confirm_password) == $base_password) {
    $usuario = new Usuario();
    $id = $dados[0]['id'];
    $usuario->setNomeCompleto($new_name);
    $usuario->setEmail($new_email);
    $usuario->setDataNascimento($born_date);
    $usuarioDAO->atualizar($usuario, $id);
    $dados_update = $usuarioDAO->carregarPorId($id);  
    unset($_SESSION['dados_pessoais']);
    $_SESSION['dados_pessoais'] = $dados_update;
    ToastSenha("Dados alterados com sucessos", "success");

  } else {
    ToastSenha("Erro! Revise se os campos foram digitados corretamente", "danger");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Alterar dados</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link href="../Template/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
  </div>
  </header>

  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Altere seus dados</h1>
            <form method="POST">
              <div class="form-group">
                <label for="email">CPF</label>
                <input value="<?= $dados[0]['cpf'] ?>" type="text" name="cpf" id="cpf" class="form-control" disabled>
              </div>
              <div class="form-group">
                <label for="email">Alterar nome</label>
                <input value="<?= $dados[0]['nome_completo'] ?>" type="text" name="new_name" id="text" class="form-control" placeholder="Digite seu nome">
              </div>
              <div class="form-group">
                <label for="email">Alterar email</label>
                <input value="<?= $dados[0]['email'] ?>" type="email" name="new_email" id="email" class="form-control" placeholder="Digite seu novo email">
              </div>
              <div class="form-group">
                <label for="data_nascimento">Alterar Data de nascimento</label>
                <input value=<?=$dados[0]['data_nascimento']?> type="text" name="date" id="data_nascimento" class="form-control" placeholder="Digite sua data de nascimento">
              </div>
              <div class="form-group mb-4">
                <label for="password">Senha</label>
                <input type="password" name="pass" id="password" class="form-control">
              </div>
              <div class="form-group mb-4">
                <label for="password">Repita a senha</label>
                <input type="password" name="pass_confirm" id="password" class="form-control">
              </div>
             <a href="#" style="text-decoration: none;"> <input name="Alterar dados" id="login" class="btn btn-block login-btn" type="submit" value="Alterar dados">
             	</a>
            </form>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="css/assets/images/fundo.jpg" alt="login image">
        </div>
      </div>
    </div>

    <?php include_once('footer.php'); ?>

   
    <!-- Toast -->
    <?php function toastSenha($mensagem, $cor) { ?>
      <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
        <div id="liveToast" class="toast hide align-items-center text-white bg-<?= $cor ?>" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
          <div class="toast-body">
              <?= $mensagem ?>
          </div>
        </div>
      </div>
    <?php } ?>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="jQuery-Mask-Plugin-master/dist/jquery.mask.js"></script>
  <script src="jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"></script>

  <script>
     $(document).ready(function(){ 
      $('.toast').toast('show');
      $('#data_nascimento').mask("00/00/0000");
    })
  </script>




  
</body>
</html>

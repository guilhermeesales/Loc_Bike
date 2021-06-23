<?php 
    include_once('login_cadastro.php');
    include_once('../Controller/UsuarioDAO.php');
    $usuarioDAO = new UsuarioDAO();

    // Variáveis
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $senha = isset($_POST['password']) ? $_POST['password'] : '';
    $conf_senha = isset($_POST['conf_password']) ? $_POST['conf_password'] : '';
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
    $nome_completo = isset($_POST['nome_user']) ? $_POST['nome_user'] : '';
    $data_nascimento = isset($_POST['data_nascimento']) ? $_POST['data_nascimento'] : '';
    $endereco_numero = isset($_POST['end_numero']) ? $_POST['end_numero'] : '';
    $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
    $cadastrado = isset($cadastrado) ? $cadastrado : '';
    $senha_diferente = false;
    

    if($senha != $conf_senha) {
      $senha_diferente = true;
    }

    if(!empty($email) && !empty($senha) && !empty($conf_senha) && !empty($cpf) && !empty($nome_completo) && !empty($data_nascimento) 
    && !empty($endereco_numero) && !empty($bairro) && !empty($cidade) && !$senha_diferente) {    
      include_once('../Model/Usuario.php');
      $usuario = new Usuario();
      $usuario->setEmail($email);
      $usuario->setSenha(sha1($senha));
      $usuario->setCpf($cpf);
      $usuario->setNomeCompleto($nome_completo);
      $usuario->setDataNascimento($data_nascimento);
      $usuario->setEnderecoENumero($endereco_numero);
      $usuario->setBairro($bairro);
      $usuario->setCidade($cidade);
      $cadastrado = $usuarioDAO->inserir($usuario);  
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Loc-Bike-Cadastro</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="../Template/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./arquivos_login_cadastro/assets/css/login.css">
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
        <li><a class="nav-link scrollto" href="./login.php">Logar</a></li>          
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
            <h1 class="login-title">Crie sua conta</h1>
            <form method="POST">

              <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" required="required" name="email" id="email" class="form-control" placeholder="Ex: joao@gmail.com">
              </div>

              <div class="form-group mb-4">
                <label for="password">Senha</label>
                <input type="password" required="required" name="password" id="password" class="form-control">
              </div>

              <div class="form-group mb-4">
                <label for="conf_password">Confirmar senha</label>
                <input type="password" required="required" name="conf_password" id="conf_password" class="form-control">
              </div>

              <div class="form-group mb-4">
                <label for="cpf">CPF</label>
                <input type="text" required="required" name="cpf" id="cpf" class="form-control" placeholder="Ex: 000.000.000-00">
              </div>

              <div class="form-group mb-4">
                <label for="nome_completo">Nome Completo</label>
                <input type="text" required="required" name="nome_user" id="nome_completo" class="form-control">
              </div>

              <div class="form-group mb-4">
                <label for="data_nascimento">Data Nascimento</label>
                <input type="text" required="required" name="data_nascimento" id="data_nascimento" class="form-control" placeholder="Ex: 00/00/0000">
              </div>

              <div class="form-group mb-4">
                <label for="end_numero">Endereço e Número</label>
                <input type="text" required="required" name="end_numero" id="end_numero" class="form-control">
              </div>

              <div class="form-group mb-4">
                <label for="bairro">Bairro</label>
                <input type="text" required="required" name="bairro" id="bairro" class="form-control">
              </div>

              <div class="form-group mb-4">
                <label for="cidade">Cidade</label>
                <input type="text" required="required" name="cidade" id="cidade" class="form-control">
              </div>

              <input name="login" id="login" class="btn btn-block login-btn" type="submit" value="Cadastrar">
            </form>
            <?php 
              if($senha_diferente) {
                toastSenha('As senhas não coincidem', 'danger');
              } else if($cadastrado) {
                toastSenha('Usuário cadastrado com sucesso!', 'success');
              }
            ?>
            <p class="login-wrapper-footer-text">Já possui uma conta? <a href="#!" class="text-reset">Logar</a></p>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="img/carrousel2.jpg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
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
      $('#cpf').mask("000.000.000-00");
      $('#data_nascimento').mask("00/00/0000");
    
    })
  </script>
  </body>
</html>

<?php include_once('footer.php'); ?>
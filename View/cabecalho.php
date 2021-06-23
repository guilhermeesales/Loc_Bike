<?php 
  session_start();
  $id = isset($_SESSION['dados_pessoais'][0]['id']) ? $_SESSION['dados_pessoais'][0]['id'] : '';
  $nome_pessoa = isset($_SESSION['dados_pessoais'][0]['nome_completo']) ? $_SESSION['dados_pessoais'][0]['nome_completo'] : '';
  $isadmin = isset($_SESSION['isadmin']) ? $_SESSION['isadmin'] : '';

  if($nome_pessoa != '') {
    $array_nome_pessoa = explode(' ', $nome_pessoa);
  }

?>

<!-- CSS -->
 <!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="loja/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../Template/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="../Template/assets/css/style.css" rel="stylesheet">

<!-- Meu CSS -->
<link rel="stylesheet" type="text/css" href="css/style.css"/>

<!-- Favicons -->
<link href="img/favicon.png" rel="icon">



<!-- ======= Header ======= -->

  <header id="header" class="fixed-top d-flex align-items-center">  
    <div class="container d-flex justify-content-between">

      <div class="" >
        <a href="../index.php"><img src="./img/logo.png" alt="" class="img-fluid" id="log"></a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>


    <?php if($isadmin == '') { ?>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="../index.php">Início</a></li>
            <li><a href="loja.php">Loja</a></li>
            <li class="dropdown"><a href="#"><span>Minha Conta</span></a>
              <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="cadastro.php">Cadastrar</a></li>
            </ul>


          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div>
    </header><!-- End Header -->
  <?php } else { ?>
    <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto" href="../index.php">Início</a></li>
            <li><a class="nav-link scrollto" href="loja.php" target="_blank">Loja</a></li>
            <li class="dropdown"><a href="#"><span>Seja bem vindo(a), <?= $array_nome_pessoa[0] ?></span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="alterar_dados.php">Configurações</a></li>
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Sair</a></li>
            </ul>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div>
    </header><!-- End Header -->
  <?php }  ?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sair da conta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Deseja sair da sua conta?
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
          <a href="sair.php"><button type="button" class="btn btn-success">Sair</button></a>
      </div>
    </div>
  </div>
</div>

<script src="../Template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Template Main JS File -->
<script src="../Template/assets/js/main.js"></script>

<?php
  include_once('cabecalho.php');
  include_once('../Controller/BicicletaDAO.php');
  $bicicletaDAO = new BicicletaDAO();
  $bicicletas = $bicicletaDAO->listarTodos();
  $pesquisa = isset($_GET['nome']) ? $_GET['nome'] : '';
  $pesquisa_bicicletas = $bicicletaDAO->listarPorPesquisa($pesquisa);
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Loc-Bike-Loja</title>

    <!-- Bootstrap core CSS -->
    <link href="loja/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="../Template/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="loja/css/shop-homepage.css" rel="stylesheet">

    <style>
      .input-pesquisar {
        margin-bottom: 15px;

      }

      .input-pesquisar input[type="text"] {
        background: none;
        border: 2px solid #ffca28;
        border-radius: 25px;
        outline: none;
        text-align: center;
        color: black;
        width: 300px;
        height: 50px;
      }


      .conteudo-loja {
        margin-top: 50px;
        margin-bottom: 50px;
      }

      

      .banner img {
        width: 100%;
      }
    </style>
  </head>

  <body>
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="img/carrousel1.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="img/carrousel2.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="img/carrousel3.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <div class="banner">
                  <img src="img/banner.jpg" alt="" srcset="">
          </div>


          <div class="conteudo-loja">

            <h2>Escolha sua Bike</h2>
            <div class='input-pesquisar'>
              <input type="text" name="nome" id="pesquisa" placeholder="Pesquise algum produto">
            </div>

            <div class="resultado">
                
            </div>

          

            <div class="conteudo-pesquisa">  
              <div class="row">
                <?php foreach($pesquisa_bicicletas as $dados) { ?>
                  <div class="col-lg-4 col-md-4 mb-4">
                    <div class="card h-100">
                      <a href="./itens.php?id_product=<?= $dados['id'] ?>"><img class="card-img-top" src="uploads/<?= $dados['foto'] ?>" alt=""></a>
                      <div class="card-body">
                        <h4 class="card-title">
                          <a href="./itens.php?id_product=<?= $dados['id'] ?>"><?= $dados['nome_modelo'] ?></a>
                        </h4>
                        <h5><?= $dados['preco'] ?></h5>
                        <p class="card-text"><strong>Descrição: </strong><?= $dados['descricao'] ?></p>
                      </div>
                      <div class="card-footer">
                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                </div>
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.col-lg-9 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
    <!-- Footer -->
    <?php include_once('footer.php') ?>

    <!-- Bootstrap core JavaScript -->
    <script src="loja/vendor/jquery/jquery.min.js"></script>
    <script src="loja/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
      $(document).ready(function() {
        $("#pesquisa").keyup(function() {
          var pesquisa = $(this).val();

          if (pesquisa != '') {
            var dados = {
              palavra: pesquisa
            }

            $('.conteudo-pesquisa').hide();

            $.post('pesquisa.php', dados, function(retorna) {
              // Mostra dentro da ul os resultados obtidos
              $(".resultado").html(retorna);

            });
          } else {
            $(".resultado").html('');
            $(".conteudo-pesquisa").show();

          }
        })
      })
    </script>
  </body>

</html>

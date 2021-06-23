<?php
  include_once('cabecalho.php');
  include_once('../Controller/BicicletaDAO.php');
  $bicicletaDAO = new BicicletaDAO();
  $id_bicicleta = isset($_GET['id_product']) ? $_GET['id_product'] : '';
  $dados_bicicleta = $bicicletaDAO->carregar($id_bicicleta);
  $produtos_relacionados = $bicicletaDAO->produtosRelacionados($id_bicicleta);
  $is_logged = isset($_SESSION['login']);
  $dados_pessoais = isset($_SESSION['dados_pessoais'][0]) ? $_SESSION['dados_pessoais'][0] : '';

  if($_SESSION['login'] == false) {
    header("Location: login.php");
  }
 
  
?>
<!DOCTYPE html>
<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Produto - <?= $dados_bicicleta[0]['nome_modelo'] ?></title>

    <!-- Bootstrap core CSS -->
    <link href="loja/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="loja/css/shop-item.css" rel="stylesheet">


    <style>
      #confirmar_locacao {
        margin-top: 20px;
      }

      #produtos-relacionados {
        margin-top: 40px;
      }

      .centralizado {
        margin: 0 auto;
      }
    </style>

  </head>

  <body>
      <!-- Page Content -->
      <div class="container">

        <div class="row">
          <div class="col-lg-9 centralizado">
            <div class="card mt-8">
              <img class="card-img-top img-fluid" src="uploads/<?= $dados_bicicleta[0]['foto'] ?>" alt="">
              <div class="card-body">
                <h3 class="card-title"><?= $dados_bicicleta[0]['nome_modelo'] ?></h3>
                <h4><?= $dados_bicicleta[0]['preco'] ?></h4>
                <p class="card-text"><?= $dados_bicicleta[0]['descricao'] ?></p>
                <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9733; </span>
                5.0
                <br>
                <button type="button" class="btn btn-success alugar" data-toggle="modal" data-target="#exampleModal2">Alugar esta bicicleta</button>
              </div>
            </div>
            <!-- /.card -->
            <hr>
            <div id="produtos-relacionados">
              <h5>Produtos Relacionados</h5>

              <div class="row">
                <?php foreach($produtos_relacionados as $produto_relacionado) { ?>
                  <div class="col-lg-3 col-md-4 mb-2">
                    <div class="card h-100">
                      <a href="itens.php?id_product=<?= $produto_relacionado['id'] ?>"><img class="card-img-top" src="uploads/<?= $produto_relacionado['foto'] ?>" alt=""></a>
                      <div class="card-body">
                        <h4 class="card-title">
                          <a href="itens.php?id_product=<?= $produto_relacionado['id'] ?>"> <?= $produto_relacionado['nome_modelo'] ?> </a>
                        </h4>
                        <h5><?= $produto_relacionado['preco'] ?></h5>
                        <p class="card-text"><strong>Descrição: </strong> <?= $descricao = strlen($produto_relacionado['descricao']) <= 30 ?  $produto_relacionado['descricao'] : substr($produto_relacionado['descricao'], 0, 31) . "..."; ?> </p>
                      </div>
                      <div class="card-footer">
                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>

          </div>
          <!-- /.col-lg-9 -->
        </div>

      </div>
      <!-- /.container -->

      <!-- Modal Formulário -->
      <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar Endereço</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Endereço:</label>
                    <input type="text" value="<?= $dados_pessoais['endereco_e_numero'] ?>" class="form-control" id="recipient-name">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Bairro:</label>
                    <input type="text" value="<?= $dados_pessoais['bairro'] ?>" class="form-control" id="message-text"></input>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <a href="https://api.whatsapp.com/send?phone=558896428301&text=Olá!%20Gostaria de alugar a%20<?=$dados_bicicleta[0]['nome_modelo']?>" target="_blank"><button type="submit" class="btn btn-primary">Confirmar Pedido</button></a>
              </div>
            </div>
          </div>
        </div>

     

    

      <?php
        include_once('footer.php'); 
      
      ?>

      <!-- Bootstrap core JavaScript -->
      <script src="loja/vendor/jquery/jquery.min.js"></script>
      <script src="loja/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
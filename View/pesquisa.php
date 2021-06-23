<?php
  include_once('../Connection/conexao.php');
  include_once('../Controller/BicicletaDAO.php');

  $bicicletaDAO = new bicicletaDAO();

  $bicicletas = $_POST['palavra'];

  $lista_bicicletas = $bicicletaDAO->listarPorPesquisa($bicicletas);

?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="loja/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <?php if (count($lista_bicicletas) <= 0) { ?>
      <p>Nenhum resultado encontrado para <span style="color:#ffca28;">"<?= $bicicletas ?>"</span>.</p>

    <?php } else { ?>
      <div class="row">
        <?php foreach ($lista_bicicletas as $resultados) {  ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="itens.php?id_product=<?= $resultados['id'] ?>"><img class="card-img-top" src="uploads/<?= $resultados['foto'] ?>" alt="foto bicicleta"></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="itens.php?id_product=<?= $resultados['id'] ?>"><?= $resultados['nome_modelo'] ?></a>
                </h4>
                <h5><?= $resultados['preco'] ?></h5>
                <p class="card-text"><?= $resultados['descricao'] ?></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </body> 
</html>
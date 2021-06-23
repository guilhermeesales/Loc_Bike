<?php 
    include_once('../Model/Bicicleta.php');
    include_once('../Controller/BicicletaDAO.php');


    $bicicleta = new Bicicleta();
    $bicicletaDAO = new BicicletaDAO();

    $modelo_bicicleta = isset($_POST['modelo_bicicleta']) ? $_POST['modelo_bicicleta'] : '';
    $descricao = isset($_POST['desc']) ? $_POST['desc'] : '';
    $valor = isset($_POST['valor']) ? $_POST['valor'] : '';
    $arquivos = $_FILES['foto'];
    $arquivoNovo = explode(".", $arquivos['name']);
    $cadastrado = false;
    $arquivo_incorreto = false;

    if($arquivoNovo[sizeof($arquivoNovo ) - 1] != 'jpg') {
        $arquivo_incorreto = true;
    } else {
        echo("Upload feito com sucesso");
        move_uploaded_file($arquivos['tmp_name'], 'uploads/'.$arquivos['name']);
    }

    if(!empty($modelo_bicicleta) && !empty($descricao) && !empty($valor) 
    && !empty($arquivos['name'])) {
        $bicicleta->setNomeModelo($modelo_bicicleta);
        $bicicleta->setDescricao($descricao);
        $bicicleta->setPreco($valor);
        $bicicleta->setFoto($arquivos['name']);

        if($bicicletaDAO->inserir($bicicleta)) {
            $cadastrado = true;
            header("Location: pagina_administrador.php?cadastro=sucesso");
        } else {
            $cadastrado = false;
        }

    } else {
        header("Location: pagina_administrador.php?cadastro=erro");
    }

    
  
    


?>
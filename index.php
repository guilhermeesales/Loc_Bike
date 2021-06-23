<?php 
    session_start();
    $id = isset($_SESSION['dados_pessoais'][0]['id']) ? $_SESSION['dados_pessoais'][0]['id'] : '';
    $nome_pessoa = isset($_SESSION['dados_pessoais'][0]['nome_completo']) ? $_SESSION['dados_pessoais'][0]['nome_completo'] : '';
    $isadmin = isset($_SESSION['isadmin']) ? $_SESSION['isadmin'] : '';
  
    // Manipulando $nome_pessoa
    if($nome_pessoa != '') {
      $array_nome_pessoa = explode(' ', $nome_pessoa);
    }

  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Loc-Bike</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./View/img/favicon.png" rel="icon">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="Template/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="Template/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="Template/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="Template/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="Template/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="Template/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="Template/assets/css/style.css" rel="stylesheet">


  <!-- Meu css -->
  <link rel="stylesheet" type="text/css" href="./View/css/style.css"/>

  <!-- =======================================================
  * Template Name: eBusiness - v4.0.1
  * Template URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-Template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">

    <div class="logo-principal">
      <a href=""><img src="./View/img/logo.png" alt="" class="img-fluid" id="log"></a>
    </div>

    <!-- ======= Header ======= -->

    <?php if($isadmin == '') { ?>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Início</a></li>
            <li><a class="nav-link scrollto" href="#about">Sobre</a></li>
            <li><a class="nav-link scrollto" href="#services">Serviços</a></li>
            <li><a class="nav-link scrollto" href="#portfolio">Portifólio</a></li>
            <li><a class="nav-link scrollto" href="#team">Time</a></li>
            <li><a href="View/loja.php">Loja</a></li>
            <li><a class="nav-link scrollto" href="#contact">Contatos</a></li>
            <li class="dropdown"><a href="#"><span>Minha Conta</span></a>
              <ul>
                <li><a href="View/login.php">Login</a></li>
                <li><a href="View/cadastro.php">Cadastrar</a></li>
            </ul>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div>
    </header><!-- End Header -->
  <?php } else if($isadmin == 0){ ?>
    <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Início</a></li>
            <li><a class="nav-link scrollto" href="#about">Sobre</a></li>
            <li><a class="nav-link scrollto" href="#services">Serviços</a></li>
            <li><a class="nav-link scrollto" href="#portfolio">Portifólio</a></li>
            <li><a class="nav-link scrollto" href="#team">Time</a></li>
            <li><a href="View/loja.php" target="_blank">Loja</a></li>
            <li><a class="nav-link scrollto" href="#contact">Contatos</a></li>
            <li class="dropdown"><a href="#"><span>Seja bem vindo(a), <?= $array_nome_pessoa[0] ?></span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="View/alterar_dados.php">Configurações</a></li>
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Sair</a></li>
            </ul>


          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div>
    </header><!-- End Header -->
  <?php } else {  ?>
    <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Início</a></li>
            <li><a class="nav-link scrollto" href="#about">Sobre</a></li>
            <li><a class="nav-link scrollto" href="#services">Serviços</a></li>
            <li><a class="nav-link scrollto" href="#portfolio">Portifólio</a></li>
            <li><a class="nav-link scrollto" href="#team">Time</a></li>
            <li><a href="View/loja.php" target="_blank">Loja</a></li>
            <li><a class="nav-link scrollto" href="#contact">Contatos</a></li>
            <li class="dropdown"><a href="#"><span>Seja bem vindo(a), <?= $array_nome_pessoa[0] ?></span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="View/pagina_administrador.php">Cadastrar Produtos</a></li>
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Sair</a></li>
            </ul>


          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div>
    </header><!-- End Header -->

  <?php } ?>

  <!-- ======= hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url(./View/img/carrousel1.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">A melhor empresa em locação de bicicletas </h2>
                <p class="animate__animated animate__fadeInUp">Trabalhamos com uma variedade de modelos de altíssima qualidade</p>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Saiba mais</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(./View/img/carrousel3.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Assistência</h2>
                <p class="animate__animated animate__fadeInUp">Visamos sempre a qualidade na prestação de serviços</p>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Saiba mais</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(./View/img/carrousel2.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Bem-estar e sustentabilidade</h2>
                <p class="animate__animated animate__fadeInUp">Ao alugar uma de nossas bicicletas, você colabora com a causa ambiental de reduzir a emissão de CO₂ na atmosfera</p>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Saiba mais</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <div id="about" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>SOBRE NÓS</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- single-well start-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-left">
              <div class="single-well">
                <a href="#">
                  <img src="./View/img/about.jpg" id="abtimg">
                </a>
              </div>
            </div>
          </div>
          <!-- single-well end-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-middle">
              <div class="single-well">
                <br>
                  <h4 class="sec-head">Quem somos e o que fazemos?</h4>
                <p>
                  <br> 

                  Criamos oportunidades e meios para garantir que as pessoas tenham opções e acesso a métodos sustentáveis de locomoção urbana, e fornecemos serviços de aluguel e uso compartilhado de bicicletas MARAVILHOSAS! 

                  <br> <br>

                  Somos a Loc-Bike uma empresa de locação, uma plataforma de e-commerce para aluguel e uso compartilhado, P2P (peer-to-peer) pessoa a pessoa, B2B (Business to Bussiness) empresa para empresa,  B2C (business to commerce) Empresa para consumidores, equipamentos e acessórios esportivos e de lazer para fins pessoais.

                  <br> <br>

                  Nossos serviços de locação além de auxiliar nossos clientes nas suas atividades pessoais, também aumentam a sua eficiência na locomoção urbana.
                </p>
                 
              </div>
            </div>
          </div>
          <!-- End col-->
        </div>
      </div>
    </div><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <div id="services" class="services-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline services-head text-center">
              <h2>NOSSOS SERVIÇOS</h2>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <!-- Start Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-card-checklist"></i>
                  </a>
                  <h4>Frenquente manutenção das bikes</h4>
                  <p>
                    Fazemos revisões constantemente em nossas bicicletas para entregarmos a nossos clientes ótimas experiências com nossos produtos.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-calendar4-week"></i>
                  </a>
                  <h4>Sistema de locação personalizado</h4>
                  <p>
                    Trabalhamos com um sistema de aluguel na qual é necessário o cadastro de nosso clientes. Além disso, trabalhamos com os rastreio de nossos produtos a fim de evitar o comprometimento de algum de nossos produtos.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-pip"></i>
                  </a>
                  <h4>Inovação em segurança</h4>
                  <p>
                    Para que as bicicletas sejam destravadas, o cliente deve utilizar o cartão fornecido pós cadastro.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Services Section -->

    <!-- ======= Team Section ======= -->
    <div id="team" class="our-team-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>DUPLA</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-12" id="afast">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
                  <img src="" alt="">
                </a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
                        <i class="bi bi-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-instagram"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Levi Anastácio</h4>
                <p>Front-end web development</p>
              </div>
            </div>
          </div>
          <!-- End column -->
          
          <!-- End column -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
                  <img src="" alt="">
                </a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
                        <i class="bi bi-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-instagram"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Guilherme Sales</h4>
                <p>Backend developer</p>
              </div>
            </div>
          </div>
          <!-- End column -->
        </div>
      </div>
    </div><!-- End Team Section -->

    <!-- ======= Rviews Section ======= -->
    <div class="reviews-area">
      <div class="row g-0">
        <div class="col-lg-6">
          <img src="./View/img/atendimento.jpg" alt="" class="img-fluid">
        </div>
        <div class="col-lg-6 work-right-text d-flex align-items-center">
          <div class="px-5 py-5 py-lg-0">
            <h2>Atendimento altamente qualificado</h2>
            <h5>Somos uma empresa na qual nos destacamos pelo eficiente atendimento na resolução de problemas, e ao repassar informações sobre nossos serviços.</h5>
            <a href="#contact" class="ready-btn scrollto">Entre em contato</a>
          </div>
        </div>
      </div>
    </div><!-- End Rviews Section -->

    <!-- ======= Portfolio Section ======= -->
    <div id="portfolio" class="portfolio-area area-padding fix">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>NOSSO PORTIFÓLIO</h2>
            </div>
          </div>
        </div>
        <div class="row wesome-project-1 fix">
          <!-- Start Portfolio -page -->
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            
          </div>
        </div>

        <div class="row awesome-project-content portfolio-container">

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-app portfolio-item">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="./View/img/insta1.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="img/p1.jpg">
                      <h4>Modelo esportivo para adultos</h4>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-web">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="./View/img/insta6.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="img/p2.jpg">
                      <h4>Modelo adulto</h4>
                      
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-card">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="./View/img/insta2.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="img/p3.jpg">
                      <h4>Modelo adulto</h4>
                      
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-web">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="./View/img/insta3.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="img/p4.jpg">
                      <h4>Modelo infantil</h4>
                      
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-app">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="./View/img/insta4.jpg" alt="" /></a>
                <div class="add-actions text-center text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="img/p5.jpg">
                      <h4>Modelo infantil</h4>
                      
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-web">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="./View/img/insta5.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="img/p6.jpg">
                      <h4>Modelo infantil</h4>
                      
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

        </div>
      </div>
    </div><!-- End Portfolio Section -->

  

    <!-- ======= Suscribe Section ======= -->
    <div class="suscribe-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
            <div class="suscribe-text text-center">
              <h3>Saiba mais sobre nossos produtos!</h3>
              <a class="sus-btn" href="View/loja.php">loja</a>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Suscribe Section -->

    <!-- ======= Contact Section ======= -->
    <div id="contact" class="contact-area">
      <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline text-center">
                <h2>CONTATOS</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Start contact icon column -->
            <div class="col-md-4">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="bi bi-phone"></i>
                  <p>
                    Tel: +1 5589 55488 55<br>
                    <span>Segunda-feira à Sexta-feira (9am-17pm)</span>
                  </p>
                </div>
              </div>
            </div>
            <!-- Start contact icon column -->
            <div class="col-md-4">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="bi bi-envelope"></i>
                  <p>
                    Email: info@example.com<br>
                    <span>Web: www.example.com</span>
                  </p>
                </div>
              </div>
            </div>
            <!-- Start contact icon column -->
            <div class="col-md-4">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="bi bi-geo-alt"></i>
                  <p>
                    Endereço: A108 Adam Street<br>
                    <span>NY 535022, USA</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- Start Google Map -->
            <div class="col-md-6">
              <!-- Start Map -->
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
              <!-- End Map -->
            </div>
            <!-- End Google Map -->

            <!-- Start  contact -->
            <div class="col-md-6">
              <div class="form contact-form">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Seu nome" required>
                  </div>
                  <div class="form-group mt-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Seu e-mail" required>
                  </div>
                  <div class="form-group mt-3">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto" required>
                  </div>
                  <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Mensagem" required></textarea>
                  </div>
                  <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Sua mensagem foi enviada. Obrigado!</div>
                  </div>
                  <div class="text-center"><button type="submit">Enviar mensagem</button></div>
                </form>
              </div>
            </div>
            <!-- End Left contact -->
          </div>
        </div>
      </div>
    </div><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <h2><span>L</span>oc-Bike</h2>
                </div>
                
                <div class="footer-icons">
                  <ul>
                    <li>
                      <a href="#"><i class="bi bi-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="bi bi-instagram"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4">
            <div class="footer-content">
              <div class="footer-head">
                <h4>Meios de contato</h4>
                <div class="footer-contacts">
                  <p><span>Tel:</span> +123 456 789</p>
                  <p><span>Email:</span> contact@example.com</p>
                  <p><span>Período de funcionamento:</span> 9am-17pm</p>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4">
            <div class="footer-content">
              <div class="footer-head">
                <h4>Instagram</h4>
                <div class="flicker-img">
                  <a href="#"><img src="./View/img/insta1.jpg" alt=""></a>
                  <a href="#"><img src="./View/img/insta2.jpg" alt=""></a>
                  <a href="#"><img src="./View/img/insta3.jpg" alt=""></a>
                  <a href="#"><img src="./View/img/insta3.jpg" alt=""></a>
                  <a href="#"><img src="./View/img/insta4.jpg" alt=""></a>
                  <a href="#"><img src="./View/img/insta5.jpg" alt=""></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>Loc-Bike</strong>. All Rights Reserved
              </p>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

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
          <a href="View/sair.php"><button type="button" class="btn btn-success">Sair</button></a>
      </div>
    </div>
  </div>
</div>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="Template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="Template/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="Template/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="Template/assets/vendor/php-email-form/validate.js"></script>
  <script src="Template/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="Template/assets/js/main.js"></script>

</body>

</html>
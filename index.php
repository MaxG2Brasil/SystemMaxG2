<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
session_start();

include('Auth/Cookie/load.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login - MaxG2</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="Pages/assets/img/favicon.png" rel="icon">
  <link href="Pages/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="Pages/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="Pages/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="Pages/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="Pages/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="Pages/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="Pages/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="Pages/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="Pages/assets/css/style.css" rel="stylesheet">

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-CTY8H0NPZR"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-CTY8H0NPZR');
  </script>
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="Pages/assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">MaxG2</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Faça o Login na sua Conta</h5>
                    <p class="text-center small">Introduza o seu Nome de utilizador e Senha para iniciar Sessão</p>
                  </div>

                  <?php
                  if (isset($_SESSION['nao_autenticado'])) :
                  ?>

                    <!-- Notification -->
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-octagon me-1"></i>
                      Usuario ou Senha Inválidos.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                  <?php
                  endif;
                  unset($_SESSION['nao_autenticado']);
                  ?>

                  <?php
                  if (isset($_SESSION['erro_interno'])) :
                  ?>

                    <!-- Notification -->
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-octagon me-1"></i>
                      Problema na Autenticação do Servidor.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                  <?php
                  endif;
                  unset($_SESSION['erro_interno']);
                  ?>

                  <form action="Auth/Login/php/login.php" class="row g-3 needs-validation" method="POST" novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Nome de Usuario:</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Por favor Insira um nome de Utilizador!</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Senha:</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Por favor entre com uma Senha!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Lembra-me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Entrar</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Não tem conta? <a href="Auth/Register/">Criar uma conta</a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main>
  <!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="Pages/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="Pages/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="Pages/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="Pages/assets/vendor/echarts/echarts.min.js"></script>
  <script src="Pages/assets/vendor/quill/quill.min.js"></script>
  <script src="Pages/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="Pages/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="Pages/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="Pages/assets/js/main.js"></script>

</body>

</html>
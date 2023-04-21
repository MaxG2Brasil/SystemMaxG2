<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Registro - MaxG2</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../Pages/assets/img/favicon.png" rel="icon">
  <link href="../../Pages/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../Pages/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../Pages/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../Pages/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../Pages/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../Pages/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../Pages/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../Pages/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../Pages/assets/css/style.css" rel="stylesheet">

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="../../" class="logo d-flex align-items-center w-auto">
                  <img src="../../Pages/assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">MaxG2</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Criar uma conta</h5>
                    <p class="text-center small">Introduza os seus dados Pessoais para criar a sua Conta</p>
                  </div>

                  <?php
                  if (isset($_SESSION['conta_cadastrada'])) :
                  ?>
                    <!-- Notification -->
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <i class="bi bi-check-circle me-1"></i>
                      Conta Cadastrado com Sucesso
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  <?php
                  endif;
                  unset($_SESSION['conta_cadastrada']);
                  ?>

                  <?php
                  if (isset($_SESSION['conta_existente'])) :
                  ?>
                    <!-- Notification -->
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-triangle me-1"></i>
                      Email Já Cadastrado no Sistema!
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  <?php
                  endif;
                  unset($_SESSION['conta_existente']);
                  ?>

                  <?php
                  if (isset($_SESSION['nao_autenticado'])) :
                  ?>

                    <!-- Notification -->
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-octagon me-1"></i>
                      Erro ao Cadastrar Conta
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                  <?php
                  endif;
                  unset($_SESSION['nao_autenticado']);
                  ?> 

                  <form action="php/register.php" class="row g-3 needs-validation" method="POST" novalidate>
                    <div class="col-12">
                      <label for="yourName" class="form-label">Nome Completo:</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Por favor, introduza o seu Nome!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email:</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Por favor, introduza um endereço de E-mail Válido!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Nome de Usuario:</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" pattern="^[^-\s][a-zA-ZÀ-ú ]*" required>
                        <div class="invalid-feedback">Por favor escolha um nome de Utilizador.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Senha:</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Por favor introduza a sua Senha!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">Concordo e aceito os <a href="#">termos e condições</a></label>
                        <div class="invalid-feedback">Deve concordar antes de submeter.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Criar Conta</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Já tem uma conta? <a href="../../">Entrar</a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>
      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../Pages/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../Pages/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../Pages/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../../Pages/assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../Pages/assets/vendor/quill/quill.min.js"></script>
  <script src="../../Pages/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../Pages/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../Pages/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../Pages/assets/js/main.js"></script>
  <script src="js/main.js"></script> 

</body>
</html>
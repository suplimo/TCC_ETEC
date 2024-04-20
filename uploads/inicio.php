<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title> Inicio </title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="style_inicio.css">
</head>


<body>

  <?php
  include "navbar2.php"; ?>

  <div class="">
    <div class="row">
      <div class="col-xl-9 col-sm-7">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/imagem 1 tcc.png" class="imagem_carrosel" alt="erro">
            </div>
            <div class="carousel-item">
              <img src="img/imagem 2 tcc.png" class="imagem_carrosel" alt="erro">
            </div>
            <div class="carousel-item">
              <img src="img/imagem 3 tcc.png" class="imagem_carrosel" alt="erro">
            </div>

          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
          </button>

        </div>
      </div>
      <div class="row align-self-center">
        <div class="col-xl-3 col-sm-1">
          <a href="calendario/index.php"><button class='glowing-btn'> AGENDAMENTOS <span class='glowing-txt'><span
                  class='faulty-letter'></span></span></button>
        </div>
      </div>
    </div>
  </div>






  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
    crossorigin="anonymous"></script>


  <!-- <footer>
    <img src="img/chavinha_branca.png" width="2%" onclick="agendamentos()" alt="erro"> KEYLABMASTER
  </footer> -->
</body>

</html>
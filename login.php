<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link href="style_login.css" rel="stylesheet">
  <title> Login </title>

</head>

<body class="backlogin">

  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <div class="navetec" col-6>
        <a><img class="simboloetec" src="img/simboloetec_branco.png" alt="erro"></a>
      </div>
      <div col-6>
        <img src="img/cps_branco.png" alt="erro">
      </div>
    </div>
  </nav>

  <div class="container text-center">
    <div class="col-lg-6 col-12">
      <div class="p-3">

        <img src="img/keylab logo.png" class="card-img-top" alt="erro">
        <div class="mb-3">
          <form action="autenticacao.php" method="POST">

            <p>
              <label for="inp" class="inp">
                <input type="email" name="email" id="email" placeholder="&nbsp;">
                <span class="label">Email Institucional</span>

              </label>
            </p>

            <div>
              <label for="inp" class="inp">
                <input type="password" name="senha" maxlength="20" size="20" id="senha" placeholder="&nbsp;">
                <span class="label"> Senha </span>
                <span><img id="olho" class="olho" src="img/eye-off.png" alt="" onclick="ocultarsenha()"></span>
              
          
              </label>
            </div>

            <button class="botao" type="submit" style="color: #ffffff"> Login </button>
          </form>

          <div class="mensagem">
          <?php 
  
          if (isset($_GET['logou']))
          {

              $erro_senha = $_GET['logou'];
              if ($erro_senha == 'erro')
              {
                echo '<div class="alert alert-danger" role="alert">
                Email ou senha incorretos!
              </div>';
              }
            }    
          ?>
</div>
        </div>
        <p style="color: #971212; font-weight: bold;">Ainda não tem conta?</p>
        <p>
        <h5> <a href="cadastro.php" class="textin"> Faça seu cadastro aqui </a> </h5>
        </p>

        <div>
          <img class="chavinha" src="img/chavinha_vermelha.png" alt="erro">
        </div>
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
    <script src="main.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="pt-br">
<?php
session_start();
  include_once "dbcon.php";
  
  $email = $_SESSION['email_institucional'];

  $sel = "SELECT * FROM usuario WHERE email_institucional = '$email'";
  $conn = mysqli_query($con , $sel);
  $raw = mysqli_fetch_assoc($conn);

  $_SESSION['imgPerfil'] = $raw['imagem'];

if (!isset($_SESSION)) { //Verificar se a sessão não já está aberta.
  session_start();
}
?>

<Head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style_perfil.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
  <title> Perfil </title>
</Head>

<body>
  <?php
  include "navbar2.php";
  include_once 'dbcon.php';
  ?>
  <?php
  $email = $_SESSION['email_institucional'];
  $query = "SELECT id, nome, email_institucional, materia, telefone FROM usuario where email_institucional = '$email'";
  $query_run = mysqli_query($con, $query);

  if (mysqli_num_rows($query_run)) {
    foreach ($query_run as $usuario) {

      ?>

      <div class="container">
        <h1>Seu Perfil</h1>
        <hr>
        <div class="row">

          <!-- left column -->
           <!-- <div class="col-md-3">
           <form action="perfil.php" method="post" enctype="multipart/form-data">


            <div id="preview"></div>


            <input type="file" name="FOTOA" id="FOTOA">
            <div class="btns">
              <div class="btn1">
                <label for="FOTOA">Escolher</label>
              </div>

              <div class="btn2">
                <button type="submit" class="btn-upload-imagem">Enviar</button>
              </div>
              </div>

            </div>
        </div>

        </form>   -->

        <form id="uploadForm" enctype="multipart/form-data">

<!-- Campo para selecionar o arquivo -->
<input type="file" name="file" id="arquivo" onchange="inputArquivoValImg()"><br><br>

<span id="preview-img">
    <img src="<?=$_SESSION['imgPerfil'];?>" alt="Imagem" style="width: 100px; height: 100px;">
</span><br><br>

<button type="button" id="uploadBtn">Enviar</button><br><br>

</form>
<!-- Fim do formulário -->

<!-- Barra de progesso -->
<!-- <progress id="barraProgresso" value="0" max="100"></progress><br> -->

<!-- Apresentar a porcentagem -->
<span id="porcentagemCarregada"></span> 

<script>
// Função para receber o arquivo e validar a extensão da imagem
function inputArquivoValImg() {

    // Receber o seletor do campo
    var arquivo = document.querySelector("#arquivo");

    // Receber o arquivo
    var valorArquivo = arquivo.value;

    // Lista de extensões de arquivo permitido
    var extensaoPermitida = /(\.jpg|\.jpeg|\.png)$/i;

    // Verificar se a extensão do arquivo está na lista de extensões permitidas
    if (!extensaoPermitida.exec(valorArquivo)) {

        arquivo.value = '';

        // Enviar mensagem de erro para o HTML
        document.getElementById("msg").innerHTML = "<p style='color: #f00;'>Erro: Necessário selecionar uma imagem JPG ou PNG!</p>";

        // Enviar a imagem para o HTML
        document.getElementById('preview-img').innerHTML = "<img src='img/icone_usuario.png' alt='Imagem' style='width: 100px; height: 100px;'>";
        return;
    } else {

        // Chamar a função para apresentar o preview da imagem
        previewImagem(arquivo);

        // Setar valor vazio para o seletor msg
        document.getElementById("msg").innerHTML = "<p></p>";
    }
}

// Função para apresentar o preview da imagem
function previewImagem(arquivo) {

    // Verificar se existe arquivo
    if ((arquivo.files) && (arquivo.files[0])) {

        // FileReader() - ler o conteúdo dos arquivos
        var reader = new FileReader();

        // onload - disparar um evento quando qualquer elemento tenha sido carregado
        reader.onload = function(e) {

            // Enviar a imagem para o HTML
            document.getElementById('preview-img').innerHTML = "<img src='" + e.target.result + "' alt='Imagem' style='width: 100px; height: 100px;'>";
        }
    }

    // readAsDataURL - Retorna os dados do formato blob como uma URL de dados - Blob representa um arquivo
    reader.readAsDataURL(arquivo.files[0]);

}

// Receber o SELETOR do botão
const uploadBtn = document.getElementById("uploadBtn");

// Receber o SELETOR da barra de progresso
const barraProgresso = document.getElementById("barraProgresso");

// Receber o SELETOR para atribuir a porcentagem do upload
const porcentagemCarregada = document.getElementById("porcentagemCarregada");

// Receber o SELETOR do formulário
const uploadForm = document.getElementById("uploadForm");

// Receber o SELETOR do campo
const arquivo = document.getElementById("arquivo");

// Aguardar o click do usuário no botão do formulário
uploadBtn.addEventListener("click", () => {

    // Receber os dados do formulário
    const dadosFormulario = new FormData(uploadForm);

    // Instânciar o objeto XMLHttpRequest para fazer solicitações HTTP assíncronas
    const solicitacaoAssincrona = new XMLHttpRequest();

    // Solicitação POST para o arquivo "upload.php", true indica que a solicitação deve ser assíncrona
    solicitacaoAssincrona.open("POST", "upload.php", true);

    // Monitorar o andamento do upload do arquivo
    // solicitacaoAssincrona.upload.onprogress: Evento que é acionado à medida que os dados são enviados para o servidor
    // O parâmetro event é um objeto que contém informações sobre o progresso do upload
    solicitacaoAssincrona.upload.onprogress = (event) => {

        // Calcular a porcentagem de conclusão do upload, dividindo o número de bytes já carregados (event.loaded) pelo tamanho total do arquivo (event.total). Isso lhe dará uma estimativa do progresso em termos percentuais.
        const porcentagem = (event.loaded / event.total) * 100;

        // Atualizar o valor da barra de progresso no HTML
        barraProgresso.value = porcentagem;

        // Atualizar a porcentagem do progresso
        porcentagemCarregada.innerHTML = porcentagem.toFixed(2) + "%";

    };

    // Acionar quando a solicitação AJAX é totalmente carregada
    solicitacaoAssincrona.onload = () => {

        // Atualizar a porcentagem para concluído
        porcentagemCarregada.innerHTML = "Upload Concluído!";
    }

    // Enviar os dados do formulário para o servidor processar
    solicitacaoAssincrona.send(dadosFormulario);

});
</script>

        <!-- edit form column -->

        <div class="col-md-9 personal-info">
          <form action="editarperfil.php" method="post" class="form-horizontal" role="form">
            <div class="form-group">
              <label class="col-lg-3 control-label"> Nome: </label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="nome" id="nome" value="<?php echo $usuario['nome']; ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label"> Email: </label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="email_institucional" id="email_institucional"
                  value="<?php echo $_SESSION['email_institucional']; ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label"> Disciplina: </label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="materia" id="materia"
                  value="<?php echo $usuario['materia']; ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label"> Telefone: </label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="telefone" id="telefone"
                  value="<?php echo $usuario['telefone']; ?>">
              </div>
            </div>

        </div>


        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input type="submit" class="btn btn-primary" value="Salvar Alterações">
          </div>
        </div>
        </form>
      </div>
      </div>
      </div>
      <?php
    }
  }

  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>

</body>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
  integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

  <script src="customCliente.js"></script>

</html>
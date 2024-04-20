    <?php
    // Verifique se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        include_once 'dbcon.php';


        // Verifique se a conexão foi bem-sucedida
        if ($con->connect_error) {
            die("Erro de conexão: " . $con->connect_error);
        }

        // Preparar e executar a consulta SQL para inserir o usuário
        $sql = "INSERT INTO usuario (nome, email_institucional, senha) VALUES ('$nome', '$email', '$senha')";
        if ($con->query($sql) === TRUE) {
            header("Location: login.php");
        } else {
            header("Location: cadastro.php?cadastro=erro");
        }

        // Fechar a conexão com o banco de dados
        $con->close();
    }
    ?>
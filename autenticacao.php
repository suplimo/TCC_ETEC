<?php
 session_start();

 include_once 'dbcon.php';

 if ($con->connect_error) {
    die("Erro na conexão com o banco de dados: " . $con->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Consulta SQL para buscar o usuário com o email fornecido
    $sql = "SELECT * FROM usuario WHERE email_institucional = '$email'";
    //echo $sql;
    $result = $con->query($sql);

    if ($result->num_rows == 1) {
        echo "encontrou usuario";
        $row = $result->fetch_assoc();
        $senha_armazenada = $row["senha"];

        // Verifica se a senha fornecida corresponde à senha armazenada no banco de dados
        if ($senha === $senha_armazenada) {

            // Login bem-sucedido
            $_SESSION['email_institucional'] = $row['email_institucional'];
            $_SESSION['id_usuario'] = $row['id_usuario'];
            header("Location: inicio.php");
            

        } else {
            header("Location: login.php?logou=erro");
        
            
        }
    } else {
        // Usuário não encontrado
        header("Location: login.php?logou=erro");


     
}

// Fecha a conexão com o banco de dados
$con->close();
?>

<script src="main.js"> </script>
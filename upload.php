<?php
session_start();
    include_once "dbcon.php";

    $email = $_SESSION['email_institucional'];



// Receber o arquivo enviado
$arquivo = $_FILES['file'];

// Local de upload
$destino_arquivo = "uploads/" . $arquivo["name"];

// Realizar o upload do arquivo
move_uploaded_file($arquivo['tmp_name'], $destino_arquivo);

$insert = "UPDATE usuario SET imagem='$destino_arquivo' WHERE email_institucional = '$email'";
$conexao = mysqli_query($con, $insert);
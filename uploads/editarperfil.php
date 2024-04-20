<?php
if (!isset($_SESSION)) { //Verificar se a sessão não já está aberta.
    session_start();
}

include_once 'dbcon.php';
$email = $_SESSION['email_institucional'];

// if ($_SERVER["REQUEST_METHOD"] == "POST")

$nome = $_POST["nome"];
$email_institucional = $_POST["email_institucional"];
$materia = $_POST["materia"];
$telefone = $_POST["telefone"];


$query = "UPDATE usuario SET nome='$nome', email_institucional='$email_institucional', materia='$materia', telefone='$telefone' WHERE email_institucional = '$email' ";
if ($con->query($query) === TRUE) {
    header("Location: inicio.php");
} else {
    header("Location: perfil.php");
}

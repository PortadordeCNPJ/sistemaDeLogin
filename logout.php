<?php 
    //Aqui a session é quebrada e é deslogado o usuário da sessão dele
    session_start();
    unset($_SESSION["usuario"]);
    unset($_SESSION["nome"]);
    unset($_SESSION["tipo"]);
    session_destroy();
    header("Location: index.php");
    exit;
?>
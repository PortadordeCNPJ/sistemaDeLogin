    <?php

    //usado para quando uma sessão é iniciada
    session_start();

    //if para testar se os dados do formulário estão vindo iguais os que vão ficar armazenados no banco. O camando "empty serve para verificar se os dados não estão vindo vazios"
    if (empty($_POST) or (empty($_POST["usuario"]) or (empty($_POST["senha"])))) {
        print "<script>location.href='index.php';</script>";
    }


    include('config.php');

    //variaveis recebendo o valor digitado no formulario
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];


    //SELECT puxando nome e senha da tabela usuarios
    $sql = "SELECT * FROM usuarios
            WHERE usuario = '{$usuario}'
            AND senha = '{$senha}'";

    $res = $conn->query($sql) or die($conn->error);

    $row = $res->fetch_object();

    $qtd = $res->num_rows;

    //If para testar se na sessão estão sendo puxados os dados certos do usuário, caso alguma informação digitada esteja errada então ele imprime uma mensagem para que o usuário digite de novo e da uma msg de erro.
    if ($qtd > 0) {
        $_SESSION["usuario"] = $usuario;
        $_SESSION["nome"] = $row->nome;
        $_SESSION["tipo"] = $row->tipo;
        print "<script>location.href='dashboard.php';</script>";
    } else{
        print "<script>alert('Usuário e/ou senha incorreto(s)');</script>";
        print "<script>location.href='index.php';</script>";
    }
    ?>
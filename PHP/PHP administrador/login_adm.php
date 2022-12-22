<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/stylemenu.css">
        <link rel="stylesheet" href="../../CSS/reset.min.css">
        <link rel="stylesheet" href="../../CSS/default.css">
        <link rel="stylesheet" href="../../CSS/style.css">
        <title>Menu</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><h2>ETECIA</h2></a>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarsExample03">
                    <ul class="navbar-nav me-auto mb-2 mb-sm-0">      
                        <li class="nav-item dropdown">
                            <div class="sub-menu-1">
                            </div>
                        </li>
                            <li> <a href="../../HTML/pagina_inicial.html">Voltar</a></li>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
    crossorigin="anonymous"></script>

</body>
</html>

<?php
    $conexao = mysqli_connect("localhost","root","","Estacionamento");

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $verificacao_login = 0;
    $verificacao_senha = 0;

    $search = mysqli_query($conexao, "SELECT * FROM Administrador WHERE LoginAdm = '$_POST[login]'");
    $num_rows = mysqli_num_rows($search);

    $search2 = mysqli_query($conexao, "SELECT * FROM Administrador WHERE SenhaAdm = '$_POST[senha]'");
    $num_rows2 = mysqli_num_rows($search2);

    if($num_rows > 0){
        $verificacao_login = 1;
    }
    else{
        echo "<div class='form'>Login incorreto!</div><br/>";
    }

    if($num_rows2 > 0){
        $verificacao_senha = 1;
    }
    else{
        echo "<div class='form'>Senha incorreta!</div><br/>";
    }

    if($verificacao_login == 1 && $verificacao_senha == 1){
        header('Location: ../../HTML/HTML administrador/menuadm.html');
    }
    else{
        echo "";
    }


?>


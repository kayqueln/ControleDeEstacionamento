<?php

include_once "Menu_exemplo_adm.html";

    $conexao = mysqli_connect("localhost","root","","Estacionamento");

    $search = mysqli_query($conexao, "SELECT * FROM Funcionario WHERE IdFuncionario = '$_POST[IdFuncionario]'");
    $num_rows = mysqli_num_rows($search);

    if (!$num_rows > 0) {
        echo '<div class="ExclusaoFuncinario">'.'O funcionário que você digitou não foi encontrado!'.'</div>'; 
    }
    else{
        $sql = mysqli_query($conexao, "INSERT INTO Acesso(DataAcesso, EntradaAcesso, SaidaAcesso, IdFuncionario) VALUES ('$_POST[DataAcesso]', '$_POST[EntradaAcesso]', '$_POST[SaidaAcesso]', '$_POST[IdFuncionario]')");

        echo '<div class="form">'.'Acesso efetuado com sucesso!'.'</div>'; 
    }


    mysqli_close($conexao);

?>
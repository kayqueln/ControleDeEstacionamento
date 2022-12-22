<?php

include_once "Menu_exemplo_adm.html";

    $conexao = mysqli_connect("localhost","root","","Estacionamento");

    $search = mysqli_query($conexao, "SELECT * FROM Funcionario WHERE IdFuncionario = '$_POST[LoginAdm]'");
    $num_rows = mysqli_num_rows($search);


    if (!$num_rows > 0) {
        echo '<div class="ExclusaoFuncinario">'.'O funcionário que você digitou não foi encontrado!'.'</div>'; 
    }
    else{

        $sql = mysqli_query($conexao, "INSERT INTO Administrador(LoginAdm, SenhaAdm, IdFuncionario) VALUES ('$_POST[LoginAdm]', '$_POST[SenhaAdm]', '$_POST[LoginAdm]')");

        echo '<div class="form">'.'Administrador cadastrado com sucesso!'.'</div>';

    }

mysqli_close($conexao); 

?>
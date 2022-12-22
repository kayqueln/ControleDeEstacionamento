<?php

include_once "Menu_exemplo_adm.html";

    $conexao = mysqli_connect("localhost","root","","Estacionamento");

    $search = mysqli_query($conexao, "SELECT * FROM Funcionario WHERE IdFuncionario = '$_POST[IdFuncionario]'");
    $num_rows = mysqli_num_rows($search);

    $search2 = mysqli_query($conexao, "SELECT * FROM Veiculo WHERE Placa = '$_POST[Placa]'");
    $num_rows2 = mysqli_num_rows($search2);


    if (!$num_rows > 0) {
        echo '<div class="form">'.'O funcionário que você digitou não foi encontrado!'.'</div>'; 
    }
    else{   
        $sql = mysqli_query($conexao, "INSERT INTO Veiculo(Placa, Modelo, Cor, IdFuncionario) VALUES ('$_POST[Placa]', '$_POST[Modelo]', '$_POST[Cor]', '$_POST[IdFuncionario]')");

        echo '<div class="form">'.'Veículo cadastrado com sucesso!'.'</div>';
    }

    mysqli_close($conexao); 

?>
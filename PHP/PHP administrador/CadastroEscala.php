<?php

include_once "Menu_exemplo_adm.html";

    $conexao = mysqli_connect("localhost","root","","Estacionamento");

    $search = mysqli_query($conexao, "SELECT * FROM Funcionario WHERE IdFuncionario = '$_POST[IdFuncionario]'");
    $num_rows = mysqli_num_rows($search);

    if (!$num_rows > 0) {
        echo '<div class="form">'.'O código que você digitou não existe!'.'</div>'; 
    }
    else{
        $sql = mysqli_query($conexao, "INSERT INTO Escala(HoraEntrada, HoraSaida, DiaSemana, IdFuncionario) 
                VALUES ('$_POST[HoraEntrada]','$_POST[HoraSaida]','$_POST[DiaSemana]','$_POST[IdFuncionario]')");
        
        echo '<div class="form">'.'Escala cadastrada com sucesso!'.'</div>'; 
    }
?>
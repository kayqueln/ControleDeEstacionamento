<?php

include_once "Menu_exemplo_adm.html";

    $conexao = mysqli_connect("localhost","root","","Estacionamento");

    $search = mysqli_query($conexao, "SELECT * FROM Escala WHERE IdFuncionario = '$_POST[IdFuncionario]'");
    $num_rows = mysqli_num_rows($search);

     //verificando se a escala existe no banco de dados
    if (!$num_rows > 0) {
        echo '<div class="form">'.'Escala não encontrada!'.'</div>'; 
    }
    else{     
        $sql = mysqli_query($conexao, "UPDATE Escala SET HoraEntrada = '$_POST[HoraEntrada]', HoraSaida = '$_POST[HoraSaida]', DiaSemana ='$_POST[DiaSemana]'WHERE IdFuncionario = '$_POST[IdFuncionario]'");

        echo '<div class="form">'.'Informações atualizadas com sucesso!'.'</div>'; 
    }

    mysqli_close($conexao);

?>
<?php

include_once "Menu_exemplo_usuario.html";

    $conexao = mysqli_connect("localhost","root","","estacionamento");

    $search = mysqli_query($conexao, "SELECT * FROM Veiculo WHERE Placa = '$_POST[Placa]'");
    $num_rows = mysqli_num_rows($search);

    if (!$num_rows > 0) {
        echo '<div class="form">
        '.'Veículo não encontrado!'.'<br><br><a class="btt" href="../../HTML/HTML usuario/MenuUsuario.html">VOLTAR</a>'.'</div>'; 
    }
    else{
        $sql = "SELECT Veiculo.Placa, Veiculo.Modelo, Veiculo.Cor, Funcionario.Nome, Funcionario.Cargo, Funcionario.IdFuncionario, Escala.HoraEntrada, Escala.HoraSaida, Escala.DiaSemana
                from Veiculo inner join Funcionario 
                on Veiculo.IdFuncionario = Funcionario.IdFuncionario
                inner join Escala 
                on Escala.IdFuncionario = Funcionario.IdFuncionario
                where (Placa = '$_POST[Placa]')";
        $resultado = mysqli_query($conexao, $sql);

        while($funcionario = mysqli_fetch_array($resultado)){
            echo "<div class='form'>".
            "<br/>Veiculo".
            "<br/>Placa: ".$funcionario['Placa'].
            "<br/>Modelo: ".$funcionario['Modelo'].
            "<br/>Cor: ".$funcionario['Cor'].
            "<br/><br/>Proprietário".
            "<br/>Nome: ".$funcionario['Nome'].
            "<br/>Cargo: ".$funcionario['Cargo'].
            "<br/>Código: ".$funcionario['IdFuncionario'].
            "<br/><br/>Escala do funcionário".
            "<br/>Horário de entrada: ".$funcionario['HoraEntrada'].
            "<br/>Horário de saída: ".$funcionario['HoraSaida'].
            "<br/>Dia(s) da semana: ".$funcionario['DiaSemana'].
            "<br/><br><a class='btt' href='../../HTML/HTML usuario/MenuUsuario.html'>VOLTAR</a>".
            "</div><br>";
        }
    }
    mysqli_close($conexao)
?>
<?php

include_once "Menu_exemplo_consultas.html";

    $conexao = mysqli_connect("localhost","root","","estacionamento");

    if (mysqli_connect_errno()) {
        echo "Erro".mysqli_connect_errno();
    }
    else{
        $sql = "SELECT Veiculo.Placa, Veiculo.Modelo, Veiculo.Cor, Funcionario.Nome, Funcionario.Cargo, Funcionario.IdFuncionario, Escala.HoraEntrada, Escala.HoraSaida, Escala.DiaSemana
                from Veiculo inner join Funcionario 
                on Veiculo.IdFuncionario = Funcionario.IdFuncionario
                inner join Escala 
                on Escala.IdFuncionario = Funcionario.IdFuncionario;";
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
        "</div><br>";
            
        }
    }
    mysqli_close($conexao)
?>
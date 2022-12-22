<?php

include_once "Menu_exemplo_adm.html";

    $conexao = mysqli_connect("localhost","root","","estacionamento");

    $search = mysqli_query($conexao, "SELECT * FROM Funcionario WHERE IdFuncionario = '$_POST[IdFuncionario]'");
    $num_rows = mysqli_num_rows($search);
 
    if (!$num_rows > 0) {
        echo '<div class="form">'.'Funcionário não encontrado!'.'</div>'; 
    }
    else{
        $sql = "SELECT Funcionario.Nome, Funcionario.Cargo, Funcionario.IdFuncionario, Funcionario.Foto, Escala.HoraEntrada, Escala.HoraSaida, Escala.DiaSemana 
        from Funcionario inner join Escala 
        on Escala.IdFuncionario = Funcionario.IdFuncionario 
        where (Funcionario.IdFuncionario = '$_POST[IdFuncionario]')";
        
        $resultado = mysqli_query($conexao, $sql);

        while($funcionario = mysqli_fetch_array($resultado)){
            echo '<div class="form">'.
            "<br/>Funcionário<br/><br/>";
            ?>
            <!DOCTYPE html> 
            <body>
                <img height="125" src="<?php echo $funcionario['Foto']?>">
            </body>
            </html>
            <?php
            echo "<br/>Nome: ".$funcionario['Nome'].
            "<br/>"."Cargo: ".$funcionario['Cargo'].
            "<br/>"."Código: ".$funcionario['IdFuncionario'].
            "<br/>".
            "<br/>"."Horário de entrada: ".$funcionario['HoraEntrada'].
            "<br/>"."Horário de saída: ".$funcionario['HoraSaida'].
            "<br/>"."Dias da semana: ".$funcionario['DiaSemana'].
            '</div>'."<br>";
            
        }
    }
    mysqli_close($conexao)
?>
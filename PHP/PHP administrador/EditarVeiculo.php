<?php  

include_once "Menu_exemplo_adm.html";

    $conexao = mysqli_connect("localhost","root","","Estacionamento");

    $search = mysqli_query($conexao, "SELECT * FROM Veiculo WHERE Placa = '$_POST[PlacaFormulario]'");
    $num_rows = mysqli_num_rows($search);

    //verificando se o veículo existe no banco de dados
    if(!$num_rows > 0){ 

        echo '<div class="form">'.'Veículo não encontrado!'.'</div>'; 

    }else{
        $sql = mysqli_query($conexao,"UPDATE Veiculo
                    SET Placa = '$_POST[Placa]', Modelo = '$_POST[Modelo]', Cor = '$_POST[Cor]'
                    WHERE Placa = '$_POST[PlacaFormulario]'");
        
        echo '<div class="form">'.'Informações atualizadas com sucesso!'.'</div>'; 
    }

    mysqli_close($conexao);
?>
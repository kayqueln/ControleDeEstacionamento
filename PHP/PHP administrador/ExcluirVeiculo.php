<?php

include_once "Menu_exemplo_adm.html";

    $conexao = mysqli_connect("localhost","root","","Estacionamento");

    $placa = $_GET['Placa'];

    $sql = "DELETE FROM Veiculo
            WHERE Placa = '$placa'";
    

    if (mysqli_query($conexao, $sql)) {
        echo '<div class="form">'.'Veículo excluído com sucesso.'.'</div>'; 
    }
    else{
        echo "Erro ao excluir: ".msqli_error($conexao);
    }

    mysqli_close($conexao);

?>

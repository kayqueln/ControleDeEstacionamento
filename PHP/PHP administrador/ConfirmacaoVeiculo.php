<?php

include_once "Menu_exemplo_adm.html";

    $conexao = mysqli_connect("localhost","root","","estacionamento");

    $placa = $_GET['Placa'];

    $sql = "SELECT * from Veiculo where Placa = '$placa'";
   
    $resultado = mysqli_query($conexao, $sql);

    if($veiculo = mysqli_fetch_array($resultado)){
        echo "<div class='form'>".
        "<br/>Tem certeza que deseja excluir esse veículo?<br/>".
        "<br/>Placa: ".$veiculo['Placa'].
        "<br/>Modelo: ".$veiculo['Modelo'].
        "<br/>Cor: ".$veiculo['Cor'].
        "</div>";
        
        echo "<div class='form'>
        <a href='../../HTML/menuadm.html'>NÃO</a><br/>
        <a href='ExcluirVeiculo.php?Placa=$placa'> SIM </a>
        </div>";
    }
    else{
        echo '<div class="form">'.'Veículo não encontrado!'.'</div>'; 
    }

    mysqli_close($conexao)
?>
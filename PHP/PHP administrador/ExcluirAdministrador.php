<?php
    include_once "Menu_exemplo_adm.html";

    $conexao = mysqli_connect("localhost","root","","Estacionamento");

    $id = $_GET['id'];
    
    if (mysqli_connect_errno()) {
        echo "Erro".mysqli_connect_errno();
    }
    else{
        $sql = "DELETE FROM Administrador
                WHERE IdFuncionario = '$id'";
    }

    if (mysqli_query($conexao, $sql)) {
        echo '<div class="form">'.'Administrador excluído com sucesso.'.'</div>'; 
    }
    else{
        echo "Erro ao excluir: ".msqli_error($conexao);
    }

    mysqli_close($conexao);

?>

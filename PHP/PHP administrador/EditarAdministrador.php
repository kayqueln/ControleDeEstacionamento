<?php  
    include_once "Menu_exemplo_adm.html";

    $conexao = mysqli_connect("localhost","root","","Estacionamento");

    $search = mysqli_query($conexao, "SELECT * FROM Administrador WHERE IdFuncionario = '$_POST[IdFuncionario]'");
    $num_rows = mysqli_num_rows($search);

    if(!$num_rows > 0){ 

        echo '<div class="form">'.'Administrador não encontrado!'.'</div>'; 

    }else{
        $sql = mysqli_query($conexao,"UPDATE Administrador
                    SET SenhaAdm = '$_POST[Senha]'
                    WHERE IdFuncionario = '$_POST[IdFuncionario]'");
        
        echo '<div class="form">'.'Informações atualizadas com sucesso!'.'</div>'; 
    }

    mysqli_close($conexao);
?>

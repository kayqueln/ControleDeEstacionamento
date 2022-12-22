<?php
    include_once "Menu_exemplo_adm.html";

    $conexao = mysqli_connect("localhost","root","","estacionamento");

    $id = $_GET['IdFuncionario'];

    $sql = "SELECT * from Funcionario where (IdFuncionario = '$id')";

    $resultado = mysqli_query($conexao, $sql);

    if($funcionario = mysqli_fetch_array($resultado)){
        echo "<div class='form'>".
        "<br/>Tem certeza que deseja excluir esse administrador?<br/>".
        "<br/>Nome: ".$funcionario['Nome'].
        "<br/>Cargo: ".$funcionario['Cargo'].
        "<br/>Código: ".$funcionario['IdFuncionario'].
        "</div><br>"; 
            
        echo "<div class='form'>
        <a href='../../HTML/menuadm.html'>NÃO</a><br/>
        <a href='ExcluirAdministrador.php?id=$id'> SIM </a>
        </div>";      
    }
    else{
        echo '<div class="form">'.'Administrador não encontrado!'.'</div>'; 
    }

    mysqli_close($conexao)
?>
<?php  

include_once "Menu_exemplo_adm.html";

    $conexao = mysqli_connect("localhost","root","","Estacionamento");

     //cadastro foto
     if(isset($_FILES['Foto'])){
        $arquivo = $_FILES['Foto'];
    
        if($arquivo ['error'])
            die("erro ao enviar o arquivo!");
    
        if($arquivo['size'] > 2097152)
            die("Falha ao enviar o arquivo! No máximo 2MB");
    }
    
    $pasta = "../arquivos/";
    $NomeDoArquivo = $arquivo['name'];
    $NovoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($NomeDoArquivo, PATHINFO_EXTENSION));

    if ($extensao != "jpg" && $extensao != "png"){
        die("Tipo de arquivo não aceito! (JPEG ou PNG)");
    }

    $caminho =  "../arquivos/" . $NovoNomeDoArquivo . "." . $extensao;
    $sucesso = move_uploaded_file($arquivo["tmp_name"], $caminho);

    $search = mysqli_query($conexao, "SELECT * FROM Funcionario WHERE IdFuncionario = '$_POST[IdFuncionario]'");
    $num_rows = mysqli_num_rows($search);

    //verificando se o funcionário existe no banco de dados
    if(!$num_rows > 0){ 

        echo '<div class="form">'.'Funcionário não encontrado!'.'</div>'; 

    }else{
        $sql = mysqli_query($conexao,"UPDATE Funcionario
                    SET Nome = '$_POST[Nome]', Cargo = '$_POST[Cargo]', Foto = '$caminho'
                    WHERE IdFuncionario = '$_POST[IdFuncionario]'");
        
        echo '<div class="form">'.'Informações atualizadas com sucesso!'.'</div>'; 
    }

    mysqli_close($conexao);
?>

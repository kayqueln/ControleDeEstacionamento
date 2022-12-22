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

    //cadastrar outras informações
    if (mysqli_connect_errno()) {
        echo "Erro".mysqli_connect_errno();
    }
    else{ 
        $sql = "INSERT INTO Funcionario(Nome, Cargo, Foto) VALUES ('$_POST[Nome]', '$_POST[Cargo]', '$caminho')";
        $sql2 = "SELECT IdFuncionario from funcionario where (Nome = '$_POST[Nome]')";
    }

    //executando comando de insert na tabela funcionario
    if (mysqli_query($conexao, $sql)) {
        echo '<div class="form">'."Funcionário cadastrado com sucesso!".'</div>';
        echo '<div class="form">'."Código do funcionário: ".'</div>';

        $resultado = mysqli_query($conexao, $sql2);

            while($funcionario = mysqli_fetch_array($resultado)){
                echo '<div class="form">'.$funcionario['IdFuncionario'].'<br/>'.'<br/>'.
                "<a href='../../HTML/HTML administrador/CadastroEscala.html'>Cadastrar uma escala</a>".
                '</div>';
                
            }
    
    }
    else{
        echo "Erro ao inserir: ".msqli_error($conexao);
    }   

    mysqli_close($conexao);

?>

<?php

    $conexao = mysqli_connect("localhost","root","","teste");

    $sql = "SELECT * from foto";
    $resultado = mysqli_query($conexao, $sql);

        while($funcionario = mysqli_fetch_array($resultado)){
          $img = $funcionario['foto'];
          echo "<img src = '$img'><br/><br/>";
        }

    mysqli_close($conexao)
?>
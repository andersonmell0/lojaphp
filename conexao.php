<?php
    $conexao = mysqli_connect("localhost", "root","", "loja");
    $dados = mysqli_query($conexao, "select * from produtos");
    $produto = mysqli_fetch_array($dados);
    
?>
<h1><?= $produto['nome']?></h1>
<p>por apenas <?= $produto['preco'];?></p>
<!-- Carregar CSS da Pagina -->
<?php
 $cabecalho_css='<link rel="stylesheet" href="css\produto.css">';
 ?>
<!-- Conexão banco -->
<?php
    $conexao = mysqli_connect("localhost", "root","", "loja");
    $dados = mysqli_query($conexao, "SELECT * FROM produtos WHERE id=$_GET[id]");
    $produto = mysqli_fetch_array($dados);
?>
<!-- Head e Header -->
<?php 
	$cabecalho_title = $produto['nome'];
	include("cabecalho.php");
?>
<!-- Corpo da Pagina -->
<div class="container">
	<div class="produto">
		<h1><?= $produto['nome']?></h1>
		<p>por apenas <?= $produto['preco']?></p>
	<!-- Formulario -->
		<form action="checkout.php" method="POST">
	<!--	<input type="hidden" name="id" value="1"> -->
            <input type="hidden" name="id" value="<?= $produto['id'] ?>">
            <input type="hidden" name="preco" value="<?= $produto['preco']?>">
            <input type="hidden" name="nome" value="<?= $produto['nome']?>">
            <fieldset class="cores">
				<legend>Escolha a Cor:</legend>
					<input type="radio" name="cor" value="verde" id="verde" checked>
					<label for="verde">
						<img src="img/produtos/foto<?= $produto['id']?>-verde.png" alt="Produto na cor verde">
					</label>
                    
					<input type="radio" name="cor" value="rosa" id="rosa">
					<label for="rosa">
						<img src="img/produtos/foto<?= $produto['id']?>-rosa.png" alt="Produto na cor rosa">
					</label>
					<input type="radio" name="cor" value="azul" id="azul">			
					<label for="azul">
						<img src="img/produtos/foto<?= $produto['id']?>-azul.png" alt="Produto na cor azul">
					</label>
			</fieldset>
			<fieldset class="tamanhos">
				<legend>Escolha o tamanho:</legend>
				<input type="range" min="36" max="46" value="42" step="2" name="tamanho" id="tamanho">
			</fieldset>
			<input type="submit" class="comprar" value="Comprar">	
		</form>
        <p></p>
	</div>
</div>
<!-- Rodapé -->
<?php include("rodape.php"); ?>
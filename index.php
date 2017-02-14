<?php 
	$cabecalho_title="Home";
	include("cabecalho.php"); 
?>
    <!--Conteúdo principal -->
    <div class="container destaque">
        <section class="busca">
                <h2>Busca</h2>
                <form>
                    <input type="search">
                    <input type="image" src="img/busca.png">
                </form>
        </section>
            <!-- fim .busca -->
        <section class="menu-tipos">
                <h2>Tipos de Imovéis</h2>
                <nav>
                    <ul>
                        <li><a href="#">Apartamentos</a>
                            <ul>
                            <li><a href="#">Novos</a></li>
                            <li><a href="#">Usados</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Casas</a>
                            <ul>
                            <li><a href="#">Novos</a></li>
                            <li><a href="#">Usados</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Terrenos</a></li>
                        <li><a href="#">Galpões</a></li>
                        <li><a href="#">Lojas</a></li>
                        <li><a href="#">Salas</a></li>
                    </ul>
                </nav>
        </section>
        <!-- fim .menu-tipos -->
        <img src="img/destaque-home.png" alt="Promoção: Imóvel em Destaque">
    </div>
    <!-- fim .container .destaque -->
    <div class="container paineis">
        <!-- os paineis de novidades e mais vendidos entrarão aqui dentro -->
        <section class="painel novidades">
            <h2>Novidades</h2>
           <ol>
            <?php
               $conexao = mysqli_connect("127.0.0.1", "root", "", "loja");
               $dados = mysqli_query($conexao, "SELECT * FROM produtos ORDER BY data DESC LIMIT 0,6");
               while ($produto = mysqli_fetch_array($dados)):
            ?>
               <li>
                   <a href="produto.php?id=<?= $produto['id'] ?> ">
                       <figure>
                           <img src="img/produtos/miniatura<?= $produto['id'] ?>.png" alt="<?= $produto['nome'] ?> ">
                           <figcaption><?= $produto['nome'] ?> por <?= $produto['preco'] ?> </figcaption>
                       </figure>
                   </a>
               </li>
               <?php endwhile; ?>
            </ol>
            </section>
        <!-- coluna mais vendidos! -->
        <section class="painel mais-vendidos">
            <h2>Mais Vendidos</h2>
            <ol>
            <?php
                $conexao = mysqli_connect("localhost","root","","loja");
                $dados = mysqli_query($conexao, "SELECT * FROM produtos ORDER BY vendas DESC LIMIT 0,6");
                while ($produto = mysqli_fetch_array($dados)):
            ?>
                <li>
                    <a href="produto.php?id=<?= $produto['id'] ?> ">
                        <figure>
                            <img src="img/produtos/miniatura<?= $produto['id'] ?>.png" alt="<?= $produto['nome'] ?> ">
                            <figcaption><?= $produto['nome'] ?> por <?= $produto['preco'] ?> </figcaption>
                        </figure>
                    </a>
                </li>
                <?php endwhile; ?>
            </ol>
        </section>
    </div>
<!-- Corpo da Pagina -->
<?php include("rodape.php"); ?>

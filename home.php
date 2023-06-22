<?php 
include_once "Includes/database.php";
include_once "Includes/head.php";
include_once "Includes/header.php";
?>

<main id="home">
    <h1 id="titulo-pagina" alt="home" title="Home" tabindex="12">HOME</h1>

    <?php

        $sql = "SELECT * FROM noticias";            
        // executa o comando SQL no DB e add os valores na variavel
        $resultado = mysqli_query($db,$sql);

        if($resultado){
            ?>
            <section id="home-noticias">
                <h3 id="pagina-artigos" alt="artigos" title="Artigos" tabindex="13">ARTIGOS</h3>
                <ul>
            <?php
            $numartigo = 1;
            $tabindex = 14;
            while($row = mysqli_fetch_array($resultado)){
                echo '<li id="lista-artigo"><a id="titulo" alt="imagem de um deficiênte visual com acesso ao artigo' . $numartigo . '" tabindex="'.$tabindex.'" href="artigos.php?cat=' . $row['NoticiaID'] . '">' . '<img src="Imagens/Artigos/' . $row['Imagem'] . '" alt="' . $row['Titulo'] . '" title="' . $row['Titulo'] . '" width="100px" height="100px">' . $row['Titulo'] . '</a></li>';
                $tabindex++;
                $numartigo++;
            }
            ?>
                </ul>
            </section>
            <?php
        }

    ?>

</main>

<?php
include_once "Includes/footer.php";
?>

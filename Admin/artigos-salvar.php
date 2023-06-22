<?php
include_once '../Includes/database.php';
include_once '_head.php';
include_once '_valida.php';

if(isset($_GET['id']) || !empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM noticias WHERE NoticiaID = ".$id;
    $resultado = mysqli_query($db,$sql);
    $dados = mysqli_fetch_array($resultado,MYSQLI_ASSOC);

}else{
    $id = '';
    $dados['Titulo'] = '';
    $dados['Subtitulo'] = '';
    $dados['Noticia'] = '';
    $dados['Imagem'] = '';
}

include_once '_menu.php';
?>
    <main>
        <h2>Administração de Artigos</h2>
        <br>
        <a id="listagem" href="artigos-lista.php">Listagem</a>
        <br>
        <form action="artigos-processa.php" method="post" enctype="multipart/form-data">
            <input type="hidden" value="salvar" name="acao">
            <input type="text" value="<?php echo $dados['Imagem'];?>" name="imagem">
            <input type="text" name="id" value="<?php echo $id;?>"><br>
            <label for="titulo">Título:</label><br>
            <input type="text" id="titulo" name="titulo" value="<?php echo $dados['Titulo'];?>"><br>
            <label for="subtitulo">Subtítulo:</label><br>
            <input type="text" id="subtitulo" name="subtitulo" value="<?php echo $dados['Subtitulo'];?>"><br>
            <label for="artigo">Artigo:</label><br>
            <textarea id="artigo" name="artigo"><?php echo $dados['Noticia'];?></textarea><br>
            <label for="imagem">Imagem:</label><br>
            <?php
            if( !empty($dados['Imagem']) ){
            ?>
            <img src="../Imagens/Artigos/<?php echo $dados['Imagem'];?>" width="150" /><br>
            <?php   
            }
            ?>
            <input type="file" name="foto">
            <hr>
            <input type="submit" value="Enviar">
        </form>
</main>
<?php
include_once '_footer.php';
?>
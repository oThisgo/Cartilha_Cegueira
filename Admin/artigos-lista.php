<?php 
include_once '_valida.php';
include_once '../Includes/database.php';
include_once '_head.php';

$sql = "SELECT * FROM noticias";
$resultado = mysqli_query($db,$sql);
$total = mysqli_num_rows($resultado);

include_once '_menu.php';
?>
    <main>
        <h2>Administração de Artigos</h2>
        <br>
        <a id="inserir" href="artigos-salvar.php">Inserir</a>
        <br>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Escritor</th>
                <th>Ações</th>
            </tr>

<?php
if($resultado){
    while ($dado = mysqli_fetch_array($resultado)) {
?>
<tr>
    <td><?php echo $dado['NoticiaID'];?></td>
    <td><a href="artigos-salvar.php?acao=salvar&id=<?php echo $dado['NoticiaID'];?>"><?php echo $dado['Titulo'];?></a></td>
    <td><a href="artigos-salvar.php?acao=salvar&id=<?php echo $dado['NoticiaID'];?>"><?php echo $dado['Subtitulo'];?></a></td>
    <td><a href="artigos-processa.php?acao=excluir&id=<?php echo $dado['NoticiaID'];?>">Excluir</a></td>
</tr>
<?php
    }
}else{
?>
<tr>
    <td colspan="4">Flopou :(</td>
</tr>
<?php
}
?>
<tr>
    <td colspan="4">Total de Registros: <?php echo $total;?></td>
</tr>
</table>

</main>
<?php
include_once '_footer.php';
?>
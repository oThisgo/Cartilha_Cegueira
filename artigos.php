<?php 
include_once "Includes/database.php";
include_once "Includes/head.php";
include_once "Includes/header.php";
?>

<main>
<?php
$id = $_REQUEST['cat'];
$sql = "SELECT * FROM noticias WHERE NoticiaID =" . $id;
$resultado = mysqli_query($db,$sql);
?>

<h1 id="titulo-pagina" alt="página de artigo" tabindex="12">PÁGINA DE ARTIGO</h1>

<?php
while ($dado = mysqli_fetch_array($resultado)) {
?>

<h1 title="<?php echo $dado['Titulo'] ?>" id="nome-artigo" tabindex="13" alt="<?php echo $dado['Titulo'] ?>"><?php echo $dado['Titulo']; ?></h1>
&nbsp
<h3 title="<?php echo $dado['Subtitulo'] ?>" id="nome-integrante" tabindex="14" alt="<?php echo $dado['Subtitulo'] ?>"><?php echo $dado['Subtitulo']; ?></h3>
&nbsp
<p title="Texto" id="texto-artigo" tabindex="15" alt="<?php echo $dado['Noticia'] ?>"><?php echo $dado['Noticia']; ?></p>

<?php
}
include_once "Includes/footer.php";
?>
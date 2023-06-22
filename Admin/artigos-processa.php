<?php 
include_once '../Includes/database.php';
include_once '_valida.php';

$acao = $_REQUEST['acao'];
$id = $_REQUEST['id'];

switch ($acao) {
    case 'excluir';
        $sql = "DELETE FROM noticias WHERE NoticiaID = ".$id;
        mysqli_query($db,$sql);
        header('location: ./artigos-lista.php');

        break;

    case 'salvar':
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $noticia = $_POST['noticia'];

        if($_FILES['foto']['size'] > 0){
            $uploaddir = '../Imagens/Artigos/';
            $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $nomearquivo = 'categoria-'.$id.'-'.rand().'.'.$extensao;
            $uploadfile = $uploaddir . $nomearquivo;
            move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile);
        }else{
            $nomearquivo = $_POST['imagem'];
        }

        if (!isset($_POST['id']) || empty($_POST['id'])){
            $sql = "INSERT INTO `noticias`(`Titulo`,`Subtitulo`,`Noticia`, `Imagem`) VALUES ('".$titulo."','".$subtitulo."','".$noticia."','".$nomearquivo."')";
        }else{
            $sql = "UPDATE `noticias` SET `Titulo`='".$titulo."', `Subtitulo`='".$subtitulo."', `Noticia`='".$noticia."', `Imagem`='".$nomearquivo."' WHERE `CategoriaID`='".$id."' ";
        }

        mysqli_query($db,$sql);
        header('location: ./artigos-lista.php');
        break;
}
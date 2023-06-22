<?php

$db_host = 'localhost';
$db_usuario = 'root';
$db_senha = '';
$db_base = 'meusite';

$db = mysqli_connect($db_host,$db_usuario,$db_senha,$db_base);
if (!$db) {
    die("flopou " . mysqli_connect_error());
}
?>
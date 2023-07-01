<?php
include("conecta.php");
$id = $_GET["id"];
$comando = $pdo->prepare("DELETE FROM lista WHERE id_pessoa=$id");
$resultado = $comando->execute();

header("Location: index.php");

?>
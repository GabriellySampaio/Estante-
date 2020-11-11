<?php
include("conexao.php");
$id=intval($_GET['id']);
$sql="DELETE FROM Livros WHERE id='$id'";
$sql_query=$conn->query($sql) or die($conn->error);
if($sql_query){
    echo "<script>alert('Livro deletado com sucesso princesinha.');location.href='index.php';</script>";
}
else {
    echo "<script>alert('Não foi possivel deletar.');location.href='index.php?p=inicial';</script>";
}
?>

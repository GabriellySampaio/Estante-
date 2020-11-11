<?php
include('conexao.php');
$autor=$_GET['ar'];
$consulta ="SELECT*FROM Livros";

$my=$conn->query($consulta) or die($conn->error);
?>
<div>
<button onclick="location.href='index.php?p=inicial'">Voltar</button>
</div>
<?php while($dado=$my->fetch_array()){ 
    if(in_array($autor,$dado)){
    ?>
    <div class ="livros">
             <img src="<?php echo $dado['foto']?>" alt="Foto">
             <h3><?php echo $dado['nome']?></h3>
             <p><b>Autor:</b><?php echo $dado['autor']?></p>
             <p><b>Editora:</b><?php echo $dado['editora']?></p>
             <p><b>Edição:</b><?php echo $dado['edicao']?></p>
             <p><b>Situação:</b><?php echo $dado['situacao']?></p>
             <p><b>Possesão:</b><?php echo $dado['possessao']?></p>
             <p class="descri"><b>Descrição:</b><?php echo $dado['descricao']?></p>
             <p class="acao"><a   href="index.php?p=editar&id=<?php echo $dado["id"];?>">Editar</a>
                <a href="javascript:if(confirm('Tem certeza que deseja deletar o livro: <?php echo $dado['nome'];?> ?'
                ))location.href='index.php?p=deletar&id=<?php echo $dado["id"];?>'">Excluir</a></p>
                
         </div>
         <?php }}?>
       
       <footer>@Gabrielly Sampaio Alves</footer>
</body>
</html>
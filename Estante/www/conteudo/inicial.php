<?php
include('conexao.php');
$consulta ="SELECT*FROM Livros";

$my=$conn->query($consulta) or die($conn->error);
?>  
<div class="novu">
        <button class="btn" onclick="location.href='index.php?p=cadastrar'">Adicionar Novo Livro</button>
      
    </div>
    <div class="novu">
        <button class="btn"  onclick="autores()">Autores</button>
    </div>
    <div id="bobu"></div>
   
    <?php while($dado=$my->fetch_array()){ ?>
        <script>pegar("<?php echo $dado['autor']?>")</script>
    <div class ="livrosini">
             <img src="<?php echo $dado['foto']?>" alt="Foto">
             <h3><?php echo $dado['nome']?></h3>
         </div>
         <?php }?>
       
    <footer>@Gabrielly Sampaio Alves</footer>
   


<?php
include("conexao.php");
$di=intval($_GET['id']);
    if(isset($_POST['confirmar'])){
       //registro dos dados
       
        foreach($_POST as $chave=>$valor)
            $_SESSION[$chave]=$conn->real_escape_string($valor);
        
       //validação dos dados
        if(strlen($_SESSION['nome'])==0){
            $erro[] = "Preencha o nome.";}
        if(strlen($_SESSION['autor'])==0){
            $erro[]="Preencha o nome do autor.";}
        if(strlen($_SESSION['edicao'])==0){
            $erro[]="Preencha a Edição.";}
        if(strlen($_SESSION['editora'])==0){
            $erro[]="Preencha a editora.";}
            if(strlen($_SESSION['descricao'])==0){
            $erro[]="Preencha a descrição.";}
        if(strlen($_SESSION['foto'])==0){
            $erro[]="Coloque o link da foto.";}
        if(strlen($_SESSION['situacao'])==0){
            $erro[]="Preencha a situação.";}
        if(strlen($_SESSION['possessao'])==0){
             $erro[]="Preencha a possessão.";}
       //inserssão mo banco

       if(count($erro)== 0){
        $sql = "UPDATE Livros SET
            nome='$_SESSION[nome]', 
            autor='$_SESSION[autor]',
            edicao='$_SESSION[edicao]',
            descricao='$_SESSION[descricao]',
            possessao='$_SESSION[possessao]',
            situacao ='$_SESSION[situacao]',
            foto='$_SESSION[foto]',
            editora='$_SESSION[editora]'
            WHERE id='$di'";

            $confirma=$conn->query($sql) or die($conn->error);

            if($confirma){

               unset($_SESSION[nome],
                $_SESSION[autor],
                $_SESSION[edicao],
                $_SESSION[descricao],
                $_SESSION[possessao],
                $_SESSION[situacao],
                $_SESSION[foto],
                $_SESSION[editora]);

                echo "<script> location.href='index.php'; alert('Livro editado'); </script>";
            }
            else{
                $erro[]=$confirma;
            }

       }    
    }
    else{
        $sql="SELECT * FROM Livros WHERE id ='$di'";
        $sql_query = $conn->query($sql) or die($conn->error);
        $linha=$sql_query->fetch_assoc();

        if(isset($_SESSION)){
            session_start();
        } 

        $_SESSION[nome] = $linha['nome'];
        $_SESSION[autor] = $linha['autor'];
        $_SESSION[edicao] = $linha['edicao'];
        $_SESSION[descricao] = $linha['descricao'];
        $_SESSION[possessao] = $linha['possessao'];
        $_SESSION[situacao] = $linha['situacao'];
        $_SESSION[foto]  = $linha['foto'];
        $_SESSION[editora] = $linha['editora'];
    }
    
?>
<?php 
if(count($erro)>0){
    echo "<div style='color:red;' class=erro>";
    foreach($erro as $valor)
        echo "$valor<br>";
    echo"</div>";
}
 ?>         
        <div>
 <button onclick="location.href='index.php?p=inicial'">Voltar</button>
 </div>
        <div id="addLivro"><br>
        <form action="index.php?p=editar&id=<?php echo $di?>" method="POST">       
             <label for="Livro">livro</label>
            <input type="text" value="<?php echo $_SESSION[nome];?>"  name="nome"  placeholder="Digite o nome do Livro"><br>

            <label for="autor">Autor</label>
            <input type="text" value="<?php echo $_SESSION[autor];?> "  name="autor"  placeholder="Digite o nome do Autor"><br>

            <label for="Edicao">Edição</label>
            <input type="text" value="<?php echo $_SESSION[edicao];?> " name="edicao"  placeholder="Digite a edição"><br>

            <label for="Editora">Editora</label>
            <input type="text"  value="<?php echo $_SESSION[editora];?>"  name="editora"  placeholder="Digite a editora"><br>

            <label for="imagem">Link da Imagem</label>
            <input type="text" value="<?php echo $_SESSION[foto];?>" name="foto"  placeholder="link da Imagem"><br>

            <label for="descricao">Descrição</label>
            <textarea id="Descricao" name="descricao" maxLength="400"><?php echo $_SESSION[descricao];?></textarea><br>
            
            <label for="situacao">Situação</label>
            <select name="situacao">
                <option value="">Selecione</option>
                <option value="lido" <?php if( $_SESSION[situacao]=='lido') echo "selected";?>>Lido</option>
                <option value="Não lido" <?php if( $_SESSION[situacao]=='Não lido') echo "selected";?>>Não lido</option>
                <option value="lendo" <?php if( $_SESSION[situacao]=='lendo') echo "selected";?>>Lendo</option>
            </select><br>

            <label for="possesao">Possesão</label>
            <select name="possessao">
                <option value="">Selecione</option>
                <option value="tenho" <?php if( $_SESSION[possessao]=='tenho') echo "selected";?>>Tenho</option>
                <option value="Não tenho" <?php if( $_SESSION[possessao]=='Não tenho') echo "selected";?>>Não tenho</option>
            </select><br>

            <input class="btn" value="Salvar" name="confirmar"type="submit">
        </form>
        </div>
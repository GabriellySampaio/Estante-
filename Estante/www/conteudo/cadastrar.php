<?php
include("conexao.php");
    if(isset($_POST['confirmar'])){
       //registro dos dados
       if(isset($_SESSION)){
            session_start();
        }
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
        $sql = "INSERT INTO Livros (
            `nome`, 
            `autor`,
            `edicao`,
            `descricao`,
            `possessao`,
            `situacao`,
            `foto`,
            `editora`)
            VALUES(
                '$_SESSION[nome]',
                '$_SESSION[autor]',
                '$_SESSION[edicao]',
                '$_SESSION[descricao]',
                '$_SESSION[possessao]',
                '$_SESSION[situacao]',
                '$_SESSION[foto]',
                '$_SESSION[editora]')";

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

                echo "<script> location.href='index.php'; alert('Livro cadastrado'); </script>";
            }
            else{
                $erro[]=$confirma;
            }


       }    
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
 
        <form action="index.php?p=cadastrar" method="POST">       
             <label for="Livro">livro</label>
            <input type="text" id="Nome" name="nome"  placeholder="Digite o nome do Livro"><br>

            <label for="autor">Autor</label>
            <input type="text" id="Autor" name="autor"  placeholder="Digite o nome do Autor"><br>

            <label for="Edicao">Edição</label>
            <input type="text" id="Edicao" name="edicao"  placeholder="Digite a edição"><br>

            <label for="Editora">Editora</label>
            <input type="text" id="Editora" name="editora"  placeholder="Digite a editora"><br>

            <label for="imagem">Link da Imagem</label>
            <input type="text" id="Imagem" name="foto"  placeholder="link da Imagem"><br>

            <label for="descricao">Descrição</label>
            <textarea id="Descricao" name="descricao" maxLength="400"></textarea><br>

            <label for="situacao">Situação</label>
            <select name="situacao">
                <option value="">Selecione</option>
                <option value="lido">Lido</option>
                <option value="Não lido">Não lido</option>
                <option value="lendo">Lendo</option>
            </select><br>

            <label for="possesao">Possesão</label>
            <select name="possessao">
                <option value="">Selecione</option>
                <option value="tenho">Tenho</option>
                <option value="Não tenho">Não tenho</option>
            </select><br>

            <input class="btn" value="Salvar" name="confirmar"type="submit">
        </form>
        </div>
       
 </body>
 </html>
      
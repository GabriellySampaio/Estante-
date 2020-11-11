<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="funcao.js"></script>
    <title>Meus Livros</title>
</head>
<body>
    <div class="principal">
    <?php
    if(isset($_GET['p'])){
        $pagina=$_GET['p'].".php";
        if(is_file("conteudo/$pagina")){
            include("conteudo/$pagina");
        }
        else{
            include("conteudo/404.php");
        }
        }
        else{
            include("conteudo/inicial.php");
    }
    
    ?>
    
    </div>
</body>
</html>
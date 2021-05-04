<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

</head>

<body>
<header class="sidenav">
<i class="fas fa-globe logo"></i>    
<nav>
    <a href="?modulo=dashboard&acao=ver"> Ínicio</a>  
    <a href="?modulo=cliente&acao=listar"> Usuários </a>  
    <a href="?modulo=imoveis&acao=listar"> Imóveis </a>  
    <a href="?modulo=reservas&acao=listar"> Reservas </a>  
    <a href="?modulo=comodidades&acao=listar"> Comodidades </a>  
    <a href="?modulo=tipos_imoveis&acao=listar"> Tipos de ímoveis </a>  
</nav>
<footer style="text-align: center;">Feito por <a href="github.com/lumamontes">Luma</a> <br>
<small>Faculdade Meta - 2021</small>
</footer>

</header>

<div class='models-container main'>

<?php
if(isset($_GET['modulo'])){ $modulo = $_GET['modulo'];}else{ $modulo = "dashboard"; }
if(isset($_GET['acao'])){ $acao = $_GET['acao'];}else{ $acao = "ver"; }

include("modulos/".$modulo."/".$acao.".php");
        
?>

</div>
</body>
</html>
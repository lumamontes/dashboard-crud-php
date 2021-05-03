<?php
    include('config/DB.php');
    $sql = "SELECT * FROM usuarios";
    $stmt = DB::Conexao()->prepare($sql);
    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
?>
<main>
<div class="title-container">
    <h1>Cadastros </h1>
    <a class="button add" href="?modulo=cliente&acao=adicionar"><i class="fas fa-plus"></i> ADICIONAR</a> 
</div>
<div class="container">
    <div class="info-container">
        <div>ID</div>
        <div>NOME</div>
        <div>EMAIL</div>
        <div>Data de Nascimento</div>
        <div>Sexo</div>
        <div>Nacionalidade</div>
        <div>OPERAÇÃO</div>
    </div>
    <?php 
    if($usuarios){
        foreach($usuarios as $usuario){ 
    ?>
        <div class="content-container">
            <div><?php echo $usuario['id'];?></div>
            <div><?php echo $usuario['nome'];?></div>
            <div><?php echo $usuario['nascimento'];?></div>
            <div><?php echo $usuario['sexo'];?></div>
            <div><?php echo $usuario['Nacionalidade'];?></div>
            <div><a class="button edit" href="?modulo=cliente&acao=editar&id=<?php echo $usuario['id'];?>"><i class="fas fa-edit"></i> EDITAR </a></div>
            <div><a class="button delete" href="?modulo=cliente&acao=excluir&id=<?php echo $usuario['id'];?>"><i class="fas fa-trash-alt"></i> EXCLUIR </a></div>    
        </div>
    <?php 
    }
} 
    
?>
</div>
</main>
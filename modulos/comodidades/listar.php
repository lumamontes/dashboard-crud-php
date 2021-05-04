<?php
    include('config/DB.php');
    $sql = "SELECT * FROM comodidades";
    $stmt = DB::Conexao()->prepare($sql);
    $stmt->execute();
    $comodidades = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
?>
<main>
<div class="title-container">
    <h1>Comodidades </h1>
    <a class="button add" href="?modulo=comodidades&acao=adicionar"><i class="fas fa-plus"></i> ADICIONAR</a> 
</div>
<div class="container" id="comodidades">
    <div class="info-container">
        <div>ID</div>
        <div>NOME</div>
        <div>OPERAÇÃO</div>
    </div>
    <?php 
    if($comodidades){
        foreach($comodidades as $comodidade){ 
    ?>
        <div class="content-container">
            <div><?php echo $comodidade['id'];?></div>
            <div><?php echo $comodidade['nome'];?></div>
            <div><a class="button edit" href="?modulo=comodidades&acao=editar&id=<?php echo $comodidade['id'];?>"><i class="fas fa-edit"></i> EDITAR </a>
            <a class="button delete" href="?modulo=comodidades&acao=excluir&id=<?php echo $comodidade['id'];?>"><i class="fas fa-trash-alt"></i> EXCLUIR </a></div>    
        </div>
    <?php 
    }
} 
    
?>
</div>
</main>
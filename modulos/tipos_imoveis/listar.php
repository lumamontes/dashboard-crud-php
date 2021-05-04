<?php
    include('config/DB.php');
    $sql = "SELECT * FROM tipos_imoveis";
    $stmt = DB::Conexao()->prepare($sql);
    $stmt->execute();
    $tipos_imoveis = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
?>
<main>
<div class="title-container">
    <h1> Tipos de ímoveis</h1>
    <a class="button add" href="?modulo=tipos_imoveis&acao=adicionar"><i class="fas fa-plus"></i> ADICIONAR</a> 
</div>
<div class="container" id="tipos_imoveis">
    <div class="info-container">
        <div>ID</div>
        <div>NOME</div>
        <div>OPERAÇÃO</div>
    </div>
    <?php 
    if($tipos_imoveis){
        foreach($tipos_imoveis as $tipo_imovel){ 
    ?>
        <div class="content-container">
            <div><?php echo $tipo_imovel['id'];?></div>
            <div><?php echo $tipo_imovel['nome'];?></div>
            <div><a class="button edit" href="?modulo=tipos_imoveis&acao=editar&id=<?php echo $tipo_imovel['id'];?>"><i class="fas fa-edit"></i> EDITAR </a>
            <a class="button delete" href="?modulo=tipos_imoveis&acao=excluir&id=<?php echo $tipo_imovel['id'];?>"><i class="fas fa-trash-alt"></i> EXCLUIR </a></div>    
        </div>
    <?php 
    }
} 
    
?>
</div>
</main>
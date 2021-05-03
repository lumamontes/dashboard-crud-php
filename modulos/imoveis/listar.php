<?php
    include('config/DB.php');
    $sql = "SELECT * FROM imoveis";
    $stmt = DB::Conexao()->prepare($sql);
    $stmt->execute();
    $imoveis = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
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
    if($imoveis){
        foreach($imoveis as $imovel){ 
    ?>
        <div class="content-container">
            <div><?php echo $imovel['id'];?></div>
            <div><?php echo $imovel['nome'];?></div>
            <div><?php echo $imovel['nascimento'];?></div>
            <div><?php echo $imovel['sexo'];?></div>
            <div><?php echo $imovel['Nacionalidade'];?></div>
            <div><a class="button edit" href="?modulo=cliente&acao=editar&id=<?php echo $imovel['id'];?>"><i class="fas fa-edit"></i> EDITAR </a></div>
            <div><a class="button delete" href="?modulo=cliente&acao=excluir&id=<?php echo $imovel['id'];?>"><i class="fas fa-trash-alt"></i> EXCLUIR </a></div>    
        </div>
    <?php 
    }
} 
    
?>
</div>
</main>
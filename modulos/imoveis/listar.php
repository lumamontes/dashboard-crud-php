<?php
    include('config/DB.php');
    $sql = "SELECT * FROM imoveis";
    $stmt = DB::Conexao()->prepare($sql);
    $stmt->execute();
    $imoveis = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
?>
<main>
<div class="title-container">
    <h1>Imóveis </h1>
    <a class="button add" href="?modulo=imoveis&acao=adicionar"><i class="fas fa-plus"></i> ADICIONAR</a> 
</div>
<div class="container">
    <div class="info-container">
        <div>ID</div>
        <div>Nome</div>
        <div>Descrição</div>
        <div>Quantidade Quartos</div>
        <div>Valor</div>
        <div>Bairro</div>
        <div>Cidade</div>
        <div>Comandos</div>
    </div>
    <?php 
    if($imoveis){
        foreach($imoveis as $imovel){ 
    ?>
        <div class="content-container" style="text-align: left;">
            <div><?php echo $imovel['id'];?></div>
            <div><?php echo $imovel['nome'];?></div>
            <div><?php echo $imovel['descricao'];?></div>
            <div><?php echo $imovel['quantidade_quartos'];?></div>
            <div><?php echo $imovel['valor'];?></div>
            <div><?php echo $imovel['bairro'];?></div>
            <div><?php echo $imovel['cidade'];?></div>
            <div><a class="button edit" href="?modulo=imoveis&acao=editar&id=<?php echo $imovel['id'];?>"><i class="fas fa-edit"></i> EDITAR </a> <br><br>
            <a class="button delete" href="?modulo=imoveis&acao=excluir&id=<?php echo $imovel['id'];?>"><i class="fas fa-trash-alt"></i> EXCLUIR </a></div>    
        </div>
    <?php 
    }
} 
    
?>
</div>
</main>
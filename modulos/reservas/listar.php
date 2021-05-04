<?php
    include('config/DB.php');
    $sql = "SELECT * FROM reservas";
    $stmt = DB::Conexao()->prepare($sql);
    $stmt->execute();
    $reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $modulo = $_GET['modulo'];
?>
<main>
<div class="title-container">
    <h1> Reservas  </h1>
    <a class="button add" href="?modulo=reservas&acao=adicionar"><i class="fas fa-plus"></i> ADICIONAR</a> 
</div>
<div class="container">
    <div class="info-container">
        <div>ID</div>
        <div>NOME</div>
        <div>Usuario_id</div>
        <div>Data de entrada</div>
        <div>Data de saída</div>
        <div>OPERAÇÃO</div>
    </div>
    <?php 
    if($reservas){
        foreach($reservas as $reserva){ 
    ?>
        <div class="content-container">
            <div> <?php echo $reserva['id'];?></div>
            <div> Reserva<?php echo $reserva['id'];?></div>
            <div><?php echo $reserva['usuario_id'];?></div>
            <div><?php echo $reserva['data_entrada'];?></div>
            <div><?php echo $reserva['data_saida'];?></div>
            <div><a class="button edit" href="?modulo=reservas&acao=editar&id=<?php echo $reserva['id'];?>"><i class="fas fa-edit"></i> EDITAR </a> <br> <br>
            <a class="button delete" href="?modulo=reservas&acao=excluir&id=<?php echo $reserva['id'];?>"><i class="fas fa-trash-alt"></i> EXCLUIR </a></div>    
        </div>
    <?php 
    }
} 
    
?>
</div>
</main>
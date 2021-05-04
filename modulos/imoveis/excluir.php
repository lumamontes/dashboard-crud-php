<?php
include('config/DB.php');
    if(isset($_GET['id']) AND is_numeric($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM imoveis WHERE id = :id";
        $stmt = DB::Conexao()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo "Registro deletado com sucesso :)";
    }else{
        echo "ID INVÁLIDO";
    }
?>
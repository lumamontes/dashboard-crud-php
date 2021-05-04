<?php
   include('config/DB.php');
   if(isset($_GET['id']) AND is_numeric($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from comodidades WHERE id = :id";
        $stmt = DB::Conexao()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

    }else{
        echo "ID INVÁLIDO";
    }
?>
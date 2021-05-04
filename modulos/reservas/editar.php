<?php
include('config/DB.php');
if(isset($_POST["botao"]) && $_POST["botao"] == "Salvar"){ 
    $id = $_POST['id'];
    $usuario_id = $_POST['usuario_id'];
    $data_entrada = $_POST['data_entrada'];
    $data_saida = $_POST['data_saida'];

    $sql = "UPDATE reservas SET usuario= :usuario_id, data_entrada=:data_entrada, data_saida, :data_saida WHERE id=:id";
    $stmt = DB::Conexao()->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':id', $id);
    $stmt->execute();    
    echo "Registro editado com sucesso!";

    }
?>
 
<?php 
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM reservas WHERE id = :id";
        $stmt = DB::Conexao()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $reserva = $stmt->fetchAll(PDO::FETCH_ASSOC);       
?>
<h1>Editar reserva</h1>
<div class="form-container">
<form method='post' action='' class="form">
   <h2>Editar</h2>  <br>
    <label for="nome">
     <input type="text" name='nome' value="<?php echo $reserva[0]['usuario_id']?>">
     <input type="text" name='nome' value="<?php echo $reserva[0]['data_entrada']?>">
     <input type="text" name='nome' value="<?php echo $reserva[0]['data_saida']?>">
    <input type='hidden' name='id' value='<?php echo $reserva[0]['id']?>'>
</label>
<input class="button" type='submit' name='botao' value='Salvar'>

</form>
</div>
<?php       

    }
    else{
        echo "ID INVÁLIDO"; 
    }
?>
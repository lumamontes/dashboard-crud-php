<?php
include('config/DB.php');
if(isset($_POST["botao"]) && $_POST["botao"] == "Salvar"){ 
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $sql = "UPDATE tipos_imoveis SET nome= :nome WHERE id=:id";
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
        $sql = "SELECT * FROM tipos_imoveis WHERE id = :id";
        $stmt = DB::Conexao()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $tipo_imovel = $stmt->fetchAll(PDO::FETCH_ASSOC);       
?>
<h1>Editar tipo de ímovel</h1>
<div class="form-container">
<form method='post' action='' class="form">
   <h2>Editar</h2>  <br>
    <label for="nome">
     <input type="text" name='nome' value="<?php echo $tipo_imovel[0]['nome']?>">
    <input type='hidden' name='id' value='<?php echo $tipo_imovel[0]['id']?>'>
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
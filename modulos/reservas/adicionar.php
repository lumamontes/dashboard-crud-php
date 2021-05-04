
<?php
include('config/DB.php');
if(isset($_POST['botao']) AND $_POST['botao'] == "Salvar"){
    $usuario_id = $_POST['usuario_id'];
    $imovel_id = $_POST['imovel_id'];
    $data_entrada = $_POST['data_entrada'];
    $data_saida = $_POST['data_saida'];

    $sql = "INSERT INTO reservas (usuario_id, data_entrada, data_saida)
                    VALUES  (:usuario_id, :data_entrada, :data_saida )";

    try{
        $stmt = DB::Conexao()->prepare($sql);   
        $stmt->bindParam(':usuario_id', $usuario_id);  
        $stmt->bindParam(':data_entrada', $data_entrada);  
        $stmt->bindParam(':data_saida', $data_saida);  
        $stmt->execute();

        echo "Registro Efetuado com Sucesso!";

    }catch(PDOException $e){
        echo "Erro ao Inserir Registro:<br/> [ ".$e->getMessage()." ]";
    }
}
?>

<h1>Adicionar tipo de ímovel</h1>
<div class="form-container">
<form method='post' action='' class="form">
   <h2>Cadastro</h2>  <br>
    <label for="nome">
        <input type="text" name='usuario_id' placeholder="Usuario"></br>
        Data de entrada <br>
        <input type="date" name='data_entrada' placeholder="Data de entrada"></br>
        Data de saída   <br>
        <input type="date" name='data_saida' placeholder="Data de saída"></br>
</label>
<input class="button" type='submit' name='botao' value='Salvar'>

</form>
</div>
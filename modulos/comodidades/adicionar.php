
<?php
include('config/DB.php');
if(isset($_POST['botao']) AND $_POST['botao'] == "Salvar"){
    $nome = $_POST['nome'];

    $sql = "INSERT INTO comodidades (nome)
                    VALUES  (:nome )";

    try{
        $stmt = DB::Conexao()->prepare($sql);   
        $stmt->bindParam(':nome', $nome);  
        $stmt->execute();

        echo "Registro Efetuado com Sucesso!";

    }catch(PDOException $e){
        echo "Erro ao Inserir Registro:<br/> [ ".$e->getMessage()." ]";
    }
}
?>

<h1>Adicionar Comodidade</h1>
<div class="form-container">
<form method='post' action='' class="form">
   <h2>Cadastro</h2>  <br>
    <label for="nome">
        <input type="text" name='nome' placeholder="Nome"></br>
</label>
<input class="button" type='submit' name='botao' value='Salvar'>

</form>
</div>

<?php
if(isset($_POST['botao']) AND $_POST['botao'] == "Salvar"){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "INSERT INTO pessoas (nome, email, telefone)
                    VALUES  (:nome, :email, :telefone)";

    try{
        $stmt = DB::Conexao()->prepare($sql);   
        $stmt->bindParam(':nome', $nome);  
        $stmt->bindParam(':email', $email);  
        $stmt->bindParam(':telefone', $telefone); 
        $stmt->execute();

        echo "Registro Efetuado com Sucesso!";

    }catch(PDOException $e){
        echo "Erro ao Inserir Registro:<br/> [ ".$e->getMessage()." ]";
    }
}
?>


<form method='post' action='' class="form">
    <label for="nome">
        Nome:       <input type="text" name='nome'></br>
    </label>
    <label for="nome">
    Email:       <input type="email" name='nome'></br>
    </label>
    <label for="nome">
    Telefone:       <input type="telefone" name='nome'></br>
    </label>

<input class="button "type='submit' name='botao' value='Salvar'>

</form>
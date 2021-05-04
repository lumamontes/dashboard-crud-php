
<?php
include('config/DB.php');
if(isset($_POST['botao']) AND $_POST['botao'] == "Salvar"){
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $CPF = $_POST['CPF'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "INSERT INTO usuarios (nome, data_nascimento, CPF, sexo, email, telefone )
                    VALUES  (:nome, :data_nascimento, :CPF, :sexo, :email, :telefone)";
   try{
        $stmt = DB::Conexao()->prepare($sql);   
        $stmt->bindParam(':nome', $nome);  
        $stmt->bindParam(':data_nascimento', $data_nascimento);  
        $stmt->bindParam(':CPF', $CPF); 
        $stmt->bindParam(':sexo', $sexo); 
        $stmt->bindParam(':email', $email); 
        $stmt->bindParam(':telefone', $telefone);
        $stmt->execute();

        echo "Registro Efetuado com Sucesso!";

    }catch(PDOException $e){
        echo "Erro ao Inserir Registro:<br/> [ ".$e->getMessage()." ]";
    }
}
?>
<h1>Adicionar usuário</h1>
<div class="form-container">
<form method='post' action='' class="form">
   <h2>Cadastro</h2>  <br>
    <label for="nome">
        <input type="text" name='nome' placeholder="Nome completo"></br>
    </label>
    <label for="data_nascimento">
        <input type="date" name='data_nascimento' placeholder="Data de nascimento"></br>
    </label>
    <label for="CPF">
        <input type="text" name='CPF' placeholder="CPF"></br>
    </label>
    <label for="sexo">
        <input type="text" name='sexo' placeholder="sexo"></br>
    </label>
    <label for="email">
        <input type="text" name='email' placeholder="email"></br>
    </label>
    <label for="telefone">
    <input type="telefone" name='telefone' placeholder="telefone"></br>
    </label>

<input class="button" type='submit' name='botao' value='Salvar'>

</form>
</div>


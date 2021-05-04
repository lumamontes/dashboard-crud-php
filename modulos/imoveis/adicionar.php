
<?php
include('config/DB.php');
if(isset($_POST['botao']) AND $_POST['botao'] == "Salvar"){
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['descricao'];
    $quantidade_quartos = $_POST['quantidade_quartos'];
    $valor = $_POST['valor'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];

    $sql = "INSERT INTO imoveis (nome, descricao, quantidade_quartos, valor, bairro, cidade )
                    VALUES  (:nome, :descricao, :quantidade_quartos, :valor, :bairro, :cidade)";
   try{
        $stmt = DB::Conexao()->prepare($sql);   
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':quantidade_quartos', $quantidade_quartos);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->execute();

        echo "Registro Efetuado com Sucesso!";

    }catch(PDOException $e){
        echo "Erro ao Inserir Registro:<br/> [ ".$e->getMessage()." ]";
    }
}
?>
<h1>Adicionar ímovel</h1>
<div class="form-container">
<form method='post' action='' class="form">
   <h2>Cadastro</h2>  <br>
    <label for="nome">
        <input type="text" name='nome' placeholder="Nome ímovel"></br>
    </label>
    <label for="data_nascimento">
        <input type="text" name='descricao' placeholder="Descrição"></br>
    </label>
    <label for="CPF">
        <input type="text" name='quantidade_quartos' placeholder="Quantidade de quartos"></br>
    </label>
    <label for="sexo">
        <input type="text" name='valor' placeholder="valor"></br>
    </label>
    <label for="email">
        <input type="text" name='bairro' placeholder="bairro"></br>
    </label>
    <label for="telefone">
    <input type="telefone" name='cidade' placeholder="cidade"></br>
    </label>

<input class="button" type='submit' name='botao' value='Salvar'>

</form>
</div>


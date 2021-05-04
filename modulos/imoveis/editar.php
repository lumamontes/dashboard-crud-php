<?php
include('config/DB.php');
if(isset($_POST["botao"]) && $_POST["botao"] == "Salvar"){ 
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['descricao'];
    $quantidade_quartos = $_POST['quantidade_quartos'];
    $valor = $_POST['valor'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];

    $sql = "UPDATE imoveis SET 
            nome   = :nome,
            descricao   = :descricao,
            quantidade_quartos   = :quantidade_quartos,
            valor   = :valor,
            bairro   = :bairro,
            cidade = :cidade
        WHERE   id  = :id";    
    $stmt = DB::Conexao()->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':quantidade_quartos', $quantidade_quartos);
    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':bairro', $bairro);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':id', $id);
    $stmt->execute();    
    echo "Registro editado com sucesso!";
    }
?>

<?php 
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM imoveis WHERE id = :id";
        $stmt = DB::Conexao()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $imovel = $stmt->fetchAll(PDO::FETCH_ASSOC);       
?>
<h1>Editar tipo de ímovel</h1>
<div class="form-container">
<form method='post' action='' class="form">
   <h2>Editar</h2>  <br>
    <label for="nome">
     <input type="text" name='nome' value="<?php echo $imovel[0]['nome']?>">
     <input type="textarea" name='descricao' value="<?php echo $imovel[0]['descricao']?>">
     <input type="text" name='quantidade_quartos' value="<?php echo $imovel[0]['quantidade_quartos']?>">
     <input type="text" name='valor' value="<?php echo $imovel[0]['valor']?>">
     <input type="text" name='bairro' value="<?php echo $imovel[0]['bairro']?>">
     <input type="text" name='cidade' value="<?php echo $imovel[0]['cidade']?>">
    <input type='hidden' name='id' value='<?php echo $imovel[0]['id']?>'>
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
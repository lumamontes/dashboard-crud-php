<?php
include('config/DB.php');
if(isset($_POST["botao"]) && $_POST["botao"] == "Salvar"){ 
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $CPF = $_POST['CPF'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "UPDATE usuarios SET 
            nome   = :nome,
            data_nascimento   = :data_nascimento,
            CPF   = :CPF,
            sexo   = :sexo,
            email   = :email,
            telefone = :telefone
        WHERE   id  = :id";    
    $stmt = DB::Conexao()->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':data_nascimento', $data_nascimento);
    $stmt->bindParam(':CPF', $CPF);
    $stmt->bindParam(':sexo', $sexo);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':id', $id);
    $stmt->execute();    
    echo "Registro editado com sucesso!";
    }
?>

<?php 
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = DB::Conexao()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);       
?>
<h1>Editar tipo de ímovel</h1>
<div class="form-container">
<form method='post' action='' class="form">
   <h2>Editar</h2>  <br>
    <label for="nome">
     <input type="text" name='nome' value="<?php echo $usuario[0]['nome']?>">
     <input type="text" name='data_nascimento' value="<?php echo $usuario[0]['data_nascimento']?>">
     <input type="text" name='CPF' value="<?php echo $usuario[0]['CPF']?>">
     <input type="text" name='sexo' value="<?php echo $usuario[0]['sexo']?>">
     <input type="text" name='email' value="<?php echo $usuario[0]['email']?>">
     <input type="text" name='telefone' value="<?php echo $usuario[0]['telefone']?>">
    <input type='hidden' name='id' value='<?php echo $usuario[0]['id']?>'>
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
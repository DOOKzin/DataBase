<?php
require('db/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco</title>
</head>
<body>
    <h1>Inserindo Dados no Bnaco</h1>
    <form method="post">
        <input type="text" name="nome" placeholder="Digite o seu nome" required>        
        <input type="email" name="email" placeholder="Digite o seu email" required>        
        <button type="submit" name="salvar">Salvar</button>   

    </form>
    <br>
    <?php 
//MODO VAGABUNDO
//$sql = $pdo->prepare("INSERT INTO clientes VALUES (null,'Lucas','email@test.com','18-09-2022')");
//$sql->execute();

if (isset($_POST['salvar'])){
    $nome= clearWave($_POST['nome']);
    $email= clearWave($_POST['email']);
    $data= date('d-m-Y');

    //validação de campos nulos
    if($nome=="" || $nome==null){
        echo "<b style='color:red'>Nome não pode estar vazio</b>";
        exit();
    }
    if($email=="" || $email==null){
        echo "<b style='color:red'>Email não pode estar vazio</b>";
        exit();
    }

    //validação: nome email
    if (!preg_match("/^[a-zA-Z-' ]*$/",$nome)){
        echo "<b style='color:red'>Somente permitido letras e espaços em branco para o nome</b>";
        exit();
    }
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<b style='color:red'>Email invalido</b>";
        exit();
    }



    $sql = $pdo->prepare("INSERT INTO clientes VALUES (null,?,?,?)");
    $sql->execute([$nome,$email,$data]);
    echo "<b style='color:purple'>Usuario inserido com sucesso</b> <b style='color:red'><3</b>";

}
    ?>
</body>
</html>
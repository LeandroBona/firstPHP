<?php

include 'config.php';

// PEGAR OS DADOS DO FOMULARIO
$nome = $_POST['nome'];
$email = $_POST['email'];

// PREPAR E EXECUTAR A QUERY
$sql = "INSERT INTO usuarios (nome,email) VALUE (?,?)";
$stmt = $conexao->prepare($sql);
$stmt -> bind_param("ss", $nome, $email);

if($stmt->execute()){
    echo "<h1>Usuário cadastrado com Sucesso</h1>";
    echo "<a href='index.php'>Voltar ao formulario</a>";
}else{
    echo "Erro ao cadastrar o usuário" . $conexao->error;
}

//Fechando a conexão
$stmt -> close();
$conexao -> close();
?>
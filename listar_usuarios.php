<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Usuários Cadastrados</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data de Cadastro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'config.php';

                    // consulta no bd
                    $sql = "SELECT id, nome, email, data_cadastro FROM usuarios";
                    $resultado = $conexao->query($sql);

                    if($resultado->num_rows > 0){
                        // exibir os dados na tela
                        while($linha = $resultado->fetch_assoc()){
                            echo "<tr>";
                            echo "<td>" . $linha["id"] . "</td>";
                            echo "<td>" . $linha["nome"] . "</td>";
                            echo "<td>" . $linha["email"] . "</td>";
                            echo "<td>" . date('d/m/Y H:i:s', strtotime($linha["data_cadastro"])) . "</td>";
                            echo "</tr>";
                        }
                    }else{
                        echo "<tr><td colspan='4'>Nenhum Usuários Cadastrado</td></tr>";
                    }
                    
                    $conexao->close();
                ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-primary">Novo Cadastro</a>
    </div>
</body>
</html>
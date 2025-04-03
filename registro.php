<?php
include('conexao.php'); // Inclui a conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos foram preenchidos
    if (empty($_POST["username_signup"]) || empty($_POST["email_signup"]) || empty($_POST["password_signup"])) {
        die("Por favor, preencha todos os campos.");
    }

    $nome = $mysqli->real_escape_string($_POST["username_signup"]);
    $email = $mysqli->real_escape_string($_POST["email_signup"]);
    $senha = $mysqli->real_escape_string($_POST["password_signup"]); // Senha sem criptografia

    // Verifica se o email já está cadastrado
    $sql_verifica = "SELECT * FROM usuários WHERE email = '$email'";
    $resultado = $mysqli->query($sql_verifica);

    if ($resultado->num_rows > 0) {
        die("Este email já está cadastrado.");
    }

    // Insere o usuário no banco de dados
    $sql = "INSERT INTO usuários (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    if ($mysqli->query($sql)) {
        echo "Cadastro realizado com sucesso! <a href='index.php'>Fazer login</a>";
    } else {
        echo "Erro ao cadastrar: " . $mysqli->error;
    }
}
?>
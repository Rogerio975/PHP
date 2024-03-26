<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    // Verifica se os campos obrigatórios foram preenchidos
    if (empty($nome) || empty($email) || empty($mensagem)) {
        echo "Por favor, preencha todos os campos obrigatórios.";
    } else {
        // Envia os dados do formulário (aqui você pode implementar o envio por email, armazenamento em banco de dados, etc.)
        echo "Nome: $nome <br>";
        echo "Email: $email <br>";
        echo "Mensagem: $mensagem <br>";
    }
}
?>

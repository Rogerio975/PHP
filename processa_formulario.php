<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    // Verifica se os campos obrigatórios foram preenchidos
    if (empty($nome) || empty($email) || empty($mensagem)) {
        // Se algum campo estiver vazio, exibe uma mensagem de falha
        $mensagem_resposta = "Por favor, preencha todos os campos obrigatórios.";
    } else {
        // Se todos os campos estiverem preenchidos, exibe uma mensagem de sucesso
        $mensagem_resposta = "O formulário foi enviado com sucesso!";
        
        // Aqui você pode adicionar o código para processar o formulário, como enviar e-mails, salvar em um banco de dados, etc.
        
        // Exemplo de envio de e-mail (substitua com seu código real)
        // mail($destinatario, $assunto, $mensagem_email);
    }
} else {
    // Se o método de requisição não for POST, redireciona para o formulário
    header("Location: formulario.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resposta do Formulário</title>
</head>
<body>
    <h2>Resposta do Formulário</h2>
    <p><?php echo $mensagem_resposta; ?></p>
</body>
</html>
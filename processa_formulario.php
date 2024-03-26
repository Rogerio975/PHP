<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "nome_do_banco_de_dados";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos estão preenchidos
    if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["mensagem"])) {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $mensagem = $_POST["mensagem"];

        // Validar o email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Preparar e executar a query SQL para inserir os dados no banco de dados
            $stmt = $conn->prepare("INSERT INTO mensagens (nome, email, mensagem) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nome, $email, $mensagem);

            if ($stmt->execute()) {
                // Se os dados forem inseridos com sucesso, envie o e-mail
                $para = "seu_email@exemplo.com";
                $assunto = "Nova mensagem do formulário de contato";
                $corpo = "Você recebeu uma nova mensagem do formulário de contato:\n\n";
                $corpo .= "Nome: $nome\n";
                $corpo .= "Email: $email\n";
                $corpo .= "Mensagem: $mensagem\n";

                // Envio de e-mail
                mail($para, $assunto, $corpo);

                // Exemplo simples de saída
                echo "Obrigado por entrar em contato, $nome! Sua mensagem foi enviada com sucesso.";
            } else {
                echo "Erro ao enviar a mensagem. Por favor, tente novamente mais tarde.";
            }
        } else {
            // Se o email não for válido, exiba uma mensagem de erro
            echo "O endereço de email fornecido não é válido.";
        }
    } else {
        // Se algum campo estiver faltando, exiba uma mensagem de erro
        echo "Por favor, preencha todos os campos do formulário.";
    }
} else {
    // Se o formulário não foi enviado via POST, redirecione de volta para o formulário
    header("Location: form_contato.html");
    exit;
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
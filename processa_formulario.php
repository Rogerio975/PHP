<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos estão preenchidos
    if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["mensagem"])) {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $mensagem = $_POST["mensagem"];

        // Validar o email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Se todos os campos estão preenchidos e o email é válido, podemos processar os dados

            // Adicionar código para enviar o email
            $para = "seuemail@example.com"; // Substitua pelo seu endereço de email
            $assunto = "Nova mensagem do formulário de contato";
            $corpo = "Nome: $nome\n";
            $corpo .= "Email: $email\n";
            $corpo .= "Mensagem:\n$mensagem";
            $headers = "From: $email" . "\r\n" .
                       "Reply-To: $email" . "\r\n" .
                       "X-Mailer: PHP/" . phpversion();

            // Envie o email
            if (mail($para, $assunto, $corpo, $headers)) {
                // Email enviado com sucesso

                // Adicionar código para salvar no banco de dados
                // Conectar ao banco de dados (substitua pelos seus próprios detalhes de conexão)
                $servername = "localhost";
                $username = "usuario";
                $password = "senha";
                $dbname = "nomedobanco";

                // Cria conexão
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Verifica a conexão
                if ($conn->connect_error) {
                    die("Falha na conexão: " . $conn->connect_error);
                }

                // Insere os dados no banco de dados
                $sql = "INSERT INTO mensagens (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";
                if ($conn->query($sql) === TRUE) {
                    echo "Obrigado por entrar em contato, $nome! Sua mensagem foi enviada com sucesso.";
                } else {
                    echo "Erro ao enviar a mensagem: " . $conn->error;
                }

                // Fecha a conexão
                $conn->close();
            } else {
                // Erro ao enviar o email
                echo "Erro ao enviar a mensagem.";
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
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Cadastrar</title>
</head>
<body>
    <h1>Cadastrar Usuário</h1>
    <form method="POST" action="processa.php">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" placeholder="Digite o nome completo."><br><br>

        <label for="email">E-mail: </label>
        <input type="text" name="email" placeholder="Digite o nome seu e-mail."><br><br>
        
        <input type="submit" value="Cadastrar">
    </form>
    
</body>
</html>
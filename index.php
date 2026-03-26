<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>meu formulario simples</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <form method="POST" class="form-box">
        <h2>qual a sua mensagem para o mundo? </h2>

        <div class="input-group">
            <input type="text" name="nome" required>
            <label>qual é seu nome dog</label>
        </div>

        <div class="input-group">
            <input type="email" name="email" required>
            <label>fala seu emeil ai pai</label>
        </div>

        <div class="input-group">
            <textarea name="mensagem" required></textarea>
            <label>bota a msg aqui</label>
        </div>

        <button type="submit">Clique se puder </button>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = htmlspecialchars($_POST["nome"]);
            $email = htmlspecialchars($_POST["email"]);
            $mensagem = htmlspecialchars($_POST["mensagem"]);

            echo "<p class='sucesso'>Mensagem enviada, $nome! 👍</p>";
        }
        ?>
    </form>
</div>

</body>
</html>
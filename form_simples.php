<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>meu formulario simples</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 100%;
            max-width: 400px;
        }

        .form-box {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
        }

        .form-box h2 {
            margin-bottom: 20px;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group input,
        .input-group textarea {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
        }

        .input-group label {
            position: absolute;
            left: 10px;
            top: 10px;
            color: #999;
            transition: 0.3s;
            background: white;
            padding: 0 5px;
        }

        .input-group input:focus + label,
        .input-group input:valid + label,
        .input-group textarea:focus + label,
        .input-group textarea:valid + label {
            top: -8px;
            font-size: 12px;
            color: #4facfe;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            background: #4facfe;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #00c6ff;
        }

        .sucesso {
            margin-top: 15px;
            color: green;
            font-weight: bold;
        }
    </style>
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
<?php
    // função recursiva com parametro ($n)
    function calcularFatorial($n){
        if($n <= 1){
            return 1;
        }
        return $n * calcularFatorial($n-1);
    }
    $mensagem="";
    if($_SERVER["REQUEST_METHOD"] == "POST" ){
        $numero = intval($_POST['numero']);
        if($numero <= 0){
            $numero = "por favor, digite um número positivo";
        }else{
            $resul = calcularFatorial($numero);
            $mensagem = "O fatorial de " .$numero. "é" .$resul;
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="apple-card text-center">
        <small class="text-secundary d-block mb-1">calculo efetuado</small>
        <strong style="color:#1d1d1f;"><?php echo $mensagem?>
    </div>
    <br>
    <a href="index.html" class="btn btn-apple w-100" style="text-decoration : none;">
        Calcular Novamente
</a>
</body> 
</html>
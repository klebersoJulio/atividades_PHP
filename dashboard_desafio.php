<?php
//parte 1

function formatarMoeda($valor) {
    return 'R$ ' . number_format($valor, 2, ',', '.');
}

// parte 2
function analisarDesempenho($vendaItem, $faturamentoTotal) {
    if ($faturamentoTotal == 0) return ["mensagem" => "Sem faturamento", "percentual" => 0, "status" => "alerta"];

    $percentual = ($vendaItem / $faturamentoTotal) * 100;

    if ($percentual < 10) {
        return ["mensagem" => "ALERTA: Baixa Conversão", "percentual" => $percentual, "status" => "alerta"];
    } else {
        return ["mensagem" => "Produto Estrela", "percentual" => $percentual, "status" => "estrela"];
    }
}

// parte 3
function gerarCardHTML($nome, $preco, $bi) {
    $nomeSeguro = htmlspecialchars($nome, ENT_QUOTES, 'UTF-8');
    $precoSeguro = htmlspecialchars($preco, ENT_QUOTES, 'UTF-8');
    $mensagemBISegura = htmlspecialchars($bi['mensagem'], ENT_QUOTES, 'UTF-8');
    $percentual = round($bi['percentual'], 1);

    // as cores baseadas no status 
    $corFundo = $bi['status'] === "alerta" ? "#fdecea" : "#e6f4ea";
    $corBorda = $bi['status'] === "alerta" ? "#f5c6cb" : "#a3d3a1";
    $corBarra = $bi['status'] === "alerta" ? "#f5c6cb" : "#4CAF50";

    $html = "
    <div style='
        border: 1px solid $corBorda; 
        border-radius: 10px; 
        padding: 15px; 
        margin: 10px; 
        width: 300px; 
        font-family: Arial, sans-serif; 
        background-color: $corFundo;
        box-shadow: 2px 2px 6px rgba(0,0,0,0.1);
    '>
        <h3 style='margin:0 0 10px 0;'>$nomeSeguro</h3>
        <p style='margin:0 0 10px 0; font-weight:bold;'>$precoSeguro</p>
        <p style='margin:0 5px 10px 0; color:#555;'>$mensagemBISegura</p>
        <div style='background:#ddd; border-radius:5px; height:12px; width:100%;'>
            <div style='width:$percentual%; background:$corBarra; height:12px; border-radius:5px;'></div>
        </div>
        <p style='margin:5px 0 0 0; font-size:12px; color:#333;'>Participação: $percentual%</p>
    </div>
    ";
    return $html;
}

// mais exemplos de produtos
$produtos = [
    ["nome" => "Pizza Margherita", "venda" => 1200.50],
    ["nome" => "Hambúrguer Gourmet", "venda" => 800.00],
    ["nome" => "Refrigerante", "venda" => 150.00],
];

$faturamentoTotal = array_sum(array_column($produtos, 'venda'));

foreach ($produtos as $produto) {
    $bi = analisarDesempenho($produto['venda'], $faturamentoTotal);
    $precoFormatado = formatarMoeda($produto['venda']);
    echo gerarCardHTML($produto['nome'], $precoFormatado, $bi);
}
?>
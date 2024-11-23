<?php
function consultarWhois($dominio) {
    $servidor = "whois.registro.br"; // Servidor WHOIS
    $porta = 43; // Porta padrão WHOIS

    $conexao = fsockopen($servidor, $porta, $erro, $erroMensagem, 10);
    if (!$conexao) {
        return "Erro ao conectar ao servidor: $erro ($erroMensagem)";
    }

    fwrite($conexao, $dominio . "\r\n");
    $resposta = '';
    while (!feof($conexao)) {
        $resposta .= fgets($conexao, 128);
    }
    fclose($conexao);

    return $resposta;
}

// Domínio a consultar
$dominio = "exemplo.com.br";
$resultado = consultarWhois($dominio);

echo "<pre>$resultado</pre>";
?>

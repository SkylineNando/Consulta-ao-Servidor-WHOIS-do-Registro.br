# Consulta WHOIS - Registro.br

Este repositório contém um projeto simples que realiza consultas ao servidor **WHOIS do Registro.br** para obter informações detalhadas sobre domínios `.br`. Desenvolvido com PHP, ele permite fácil integração e exibição de resultados de consultas WHOIS.

---

## 🚀 Funcionalidades

- Consulta direta ao servidor **whois.registro.br**.
- Exibição de informações como:
  - Nome do domínio.
  - Status do domínio.
  - Datas de criação, expiração e última atualização.
  - Servidores DNS associados.
  - Contatos administrativos e técnicos.
- Totalmente escrito em PHP.

---

## 📋 Requisitos

- PHP 7.4 ou superior.
- Acesso à internet.
- Um ambiente servidor (Apache, Nginx ou PHP Built-in Server).

---

## 🛠️ Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/Skylinenando/consulta-whois-registrobr.git
   cd consulta-whois-registrobr
   ```

2. Certifique-se de que o PHP está instalado:
   ```bash
   php --version
   ```

3. Inicie o servidor local:
   ```bash
   php -S localhost:8000
   ```

4. Acesse no navegador:
   ```
   http://localhost:8000
   ```

---

## ✨ Uso

### Via Interface Web
1. Insira o domínio que deseja consultar no campo de busca (ex.: `exemplo.com.br`).
2. Clique em "Consultar".
3. Visualize as informações detalhadas retornadas pelo servidor WHOIS.

### Via Linha de Comando
Para realizar a consulta diretamente pelo terminal:
```bash
whois exemplo.com.br
```

---

## 💻 Exemplo de Código

Aqui está o script principal para realizar consultas WHOIS:

```php
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
```

---

## 🛑 Limitações

- O servidor **whois.registro.br** pode bloquear consultas muito frequentes.
- Apenas domínios **.br** são suportados.
- Respeite a política de uso do Registro.br e evite consultas em massa.

---

## 🤝 Contribuições

Contribuições são bem-vindas! Para colaborar:
- Crie uma **issue** para relatar problemas ou sugerir melhorias.
- Envie um **pull request** com suas alterações.

---

## 📄 Licença

Este projeto está licenciado sob a **MIT License**. Consulte o arquivo [LICENSE](LICENSE) para mais detalhes.

---

## 📞 Contato

Para dúvidas ou suporte:
- **Perfil no GitHub:** [Skylinenando](https://github.com/Skylinenando)

---

### Observações
1. **Correções de Markdown:** Foram ajustadas quebras de linha e formatações de código.
2. **Estrutura consistente:** Melhor organização entre seções.
3. **Conteúdo claro:** Foco em facilitar a leitura e compreensão para o público do GitHub.

Agora você pode copiar e colar este conteúdo diretamente no arquivo `README.md` do repositório! 😊

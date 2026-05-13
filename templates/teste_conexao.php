<?php
/**
 * PASSO 3 — TESTE DE CONEXÃO
 * 
 * Como usar:
 * 1. Faça upload deste arquivo para a RAIZ do seu projeto no servidor
 * 2. Certifique-se de que config/database.php já existe e está preenchido
 * 3. Acesse pelo navegador (ex: https://seudominio.com.br/teste_conexao.php)
 * 4. Copie TUDO que aparecer na tela e envie para a IA
 * 
 * O que mostra:
 * - Se a conexão com o banco funciona
 * - Qual banco está conectado
 * - Lista de todas as tabelas encontradas
 * - Se houver erro, a mensagem detalhada
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h2>Passo 3 — Teste de Conexão com o Banco</h2>";

echo "<p><strong>Pasta atual do arquivo:</strong><br>";
echo htmlspecialchars(__DIR__);

$configPath = __DIR__ . '/config/database.php';

echo "<p><strong>Arquivo de conexão esperado:</strong><br>";
echo htmlspecialchars($configPath);

if (!file_exists($configPath)) {
    die("<p style='color:red;'><strong>ERRO:</strong> O arquivo config/database.php não foi encontrado.<br>
    Volte ao Passo 2 e crie o arquivo de conexão primeiro.</p>");
}

echo "<p style='color:green;'>✓ Arquivo config/database.php encontrado.</p>";

require_once $configPath;

if (!isset($pdo)) {
    die("<p style='color:red;'><strong>ERRO:</strong> A variável \$pdo não foi definida no database.php.</p>");
}

echo "<p style='color:green;'>✓ Variável \$pdo carregada com sucesso.</p>";

try {
    $stmt = $pdo->query("SELECT DATABASE() AS banco_atual, NOW() AS data_servidor, VERSION() AS versao_mysql");
    $info = $stmt->fetch();

    echo "<hr>";
    echo "<h3 style='color:green;'>✓ Conexão realizada com sucesso!</h3>";

    echo "<p><strong>Banco conectado:</strong> " . htmlspecialchars($info['banco_atual']) . "</p>";
    echo "<p><strong>Versão MySQL:</strong> " . htmlspecialchars($info['versao_mysql']) . "</p>";
    echo "<p><strong>Data/hora do servidor:</strong> " . htmlspecialchars($info['data_servidor']) . "</p>";

    echo "<hr>";
    echo "<h3>Tabelas encontradas no banco</h3>";

    $tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);

    if (!$tables) {
        echo "<p style='color:orange;'>Nenhuma tabela encontrada neste banco.</p>";
    } else {
        echo "<p>Total: " . count($tables) . " tabelas</p><ul>";
        foreach ($tables as $table) {
            echo "<li>" . htmlspecialchars($table) . "</li>";
        }
        echo "</ul>";
    }

    echo "<hr>";
    echo "<p style='color:green;'><strong>✓ Teste finalizado.</strong> Envie esta página inteira para a IA.</p>";
    echo "<p>Agora vá para o Passo 4 (gerar_memorial.php) para obter a estrutura detalhada do banco em JSON.</p>";

} catch (Throwable $e) {
    echo "<hr>";
    echo "<h3 style='color:red;'>Erro durante o teste</h3>";
    echo "<p><strong>Mensagem:</strong><br>" . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><strong>Arquivo:</strong><br>" . htmlspecialchars($e->getFile()) . "</p>";
    echo "<p><strong>Linha:</strong><br>" . htmlspecialchars((string) $e->getLine()) . "</p>";
}

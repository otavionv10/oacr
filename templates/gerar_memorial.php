<?php
/**
 * PASSO 4 — GERADOR DE MEMORIAL DO BANCO (JSON)
 * 
 * Como usar:
 * 1. Faça upload deste arquivo para a RAIZ do seu projeto no servidor
 * 2. Certifique-se de que config/database.php já existe e está preenchido
 * 3. Acesse pelo navegador (ex: https://seudominio.com.br/gerar_memorial.php)
 * 4. Clique no botão "Baixar JSON" e envie o arquivo para a IA
 * 
 * O que gera:
 * - JSON completo com todas as tabelas, colunas, tipos, chaves, índices
 * - Estrutura pronta para a IA entender o banco sem precisar adivinhar
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

$configPath = __DIR__ . '/config/database.php';

if (!file_exists($configPath)) {
    die("<p style='color:red;'>config/database.php não encontrado. Faça o Passo 2 primeiro.</p>");
}

require_once $configPath;

if (!isset($pdo)) {
    die("<p style='color:red;'>Erro: \$pdo não definido.</p>");
}

// Monta o memorial completo
$memorial = [
    'gerado_em' => date('Y-m-d H:i:s'),
    'servidor'  => $_SERVER['SERVER_NAME'] ?? 'N/A',
    'php_version' => PHP_VERSION,
];

try {
    // Nome do banco
    $stmt = $pdo->query("SELECT DATABASE() AS db");
    $memorial['banco'] = $stmt->fetch()['db'];

    // Tabelas
    $tabelas = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
    $memorial['tabelas'] = [];

    foreach ($tabelas as $tabela) {
        // Informações da tabela
        $info = $pdo->query("SHOW TABLE STATUS WHERE Name = " . $pdo->quote($tabela))->fetch();
        
        // Colunas
        $colunas = $pdo->query("SHOW FULL COLUMNS FROM `{$tabela}`")->fetchAll();
        
        // Chaves/índices
        $indexes = $pdo->query("SHOW INDEX FROM `{$tabela}`")->fetchAll();

        $cols = [];
        foreach ($colunas as $col) {
            $cols[] = [
                'nome'       => $col['Field'],
                'tipo'       => $col['Type'],
                'nulo'       => $col['Null'],
                'padrao'     => $col['Default'],
                'extra'      => $col['Extra'],
                'comentario' => $col['Comment'],
            ];
        }

        $memorial['tabelas'][] = [
            'nome'        => $tabela,
            'engine'      => $info['Engine'] ?? null,
            'collation'   => $info['Collation'] ?? null,
            'rows'        => $info['Rows'] ?? 0,
            'comentario'  => $info['Comment'] ?? '',
            'colunas'     => $cols,
            'total_colunas' => count($cols),
        ];
    }

    $memorial['total_tabelas'] = count($tabelas);

} catch (Throwable $e) {
    die("<p style='color:red;'>Erro ao gerar memorial: " . htmlspecialchars($e->getMessage()) . "</p>");
}

// Se for download, retorna JSON puro
if (isset($_GET['download'])) {
    header('Content-Type: application/json; charset=utf-8');
    header('Content-Disposition: attachment; filename="memorial_banco.json"');
    echo json_encode($memorial, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

// Exibe na tela com botão de download
$json = json_encode($memorial, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<title>Passo 4 — Memorial do Banco</title>
<style>
body { font-family: sans-serif; max-width: 900px; margin: 20px auto; padding: 0 15px; }
h2 { color: #333; }
.btn {
    display: inline-block; padding: 12px 24px;
    background: #22c55e; color: #fff; text-decoration: none;
    border-radius: 6px; font-size: 16px; font-weight: bold;
    margin: 10px 0;
}
.btn:hover { background: #16a34a; }
pre {
    background: #1e293b; color: #e2e8f0; padding: 15px;
    border-radius: 6px; overflow-x: auto; font-size: 13px;
    max-height: 600px; overflow-y: auto;
}
.resumo { background: #f0fdf4; padding: 15px; border-radius: 6px; border: 1px solid #bbf7d0; margin: 15px 0; }
.erro { color: #dc2626; }
.ok { color: #16a34a; }
</style>
</head>
<body>

<h2>Passo 4 — Memorial do Banco de Dados</h2>

<div class="resumo">
    <p><strong>Banco:</strong> <?= htmlspecialchars($memorial['banco']) ?></p>
    <p><strong>Tabelas encontradas:</strong> <?= $memorial['total_tabelas'] ?></p>
    <p><strong>Gerado em:</strong> <?= $memorial['gerado_em'] ?></p>
</div>

<p>Clique no botão abaixo para baixar o arquivo JSON com a estrutura completa do banco.</p>
<p><strong>Depois envie este arquivo JSON para a IA.</strong></p>

<a class="btn" href="?download=1">⬇ Baixar JSON do Memorial</a>

<hr>

<p><small>Pré-visualização do JSON (últimas linhas podem estar ocultas):</small></p>
<pre><?= htmlspecialchars($json) ?></pre>

</body>
</html>

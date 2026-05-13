<?php
/**
 * PASSO 2 — CONEXÃO COM O BANCO DE DADOS
 * 
 * Como usar:
 * 1. Crie a pasta config/ na raiz do seu projeto (se não existir)
 * 2. Salve este arquivo como config/database.php
 * 3. Preencha os dados corretos do seu banco abaixo
 * 4. Depois siga para o Passo 3 (teste_conexao.php)
 * 
 * ATENÇÃO: Preencha apenas as 4 variáveis abaixo com os dados do SEU banco.
 */

$db_host = 'localhost';     // Geralmente 'localhost' ou o IP do servidor de banco
$db_name = 'nome_do_banco'; // Substitua pelo nome do seu banco de dados
$db_user = 'usuario';        // Substitua pelo usuário do banco
$db_pass = 'senha';          // Substitua pela senha do banco

// ─────────────────────────────────────────────────────
// Não altere nada abaixo desta linha
// ─────────────────────────────────────────────────────

try {
    $dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";
    $pdo = new PDO($dsn, $db_user, $db_pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

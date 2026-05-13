<?php
/**
 * PASSO 1 — DIAGNÓSTICO DO SERVIDOR
 * 
 * Como usar:
 * 1. Faça upload deste arquivo para a RAIZ do seu projeto no servidor
 * 2. Acesse ele pelo navegador (ex: https://seudominio.com.br/caminho.php)
 * 3. Copie TUDO que aparecer na tela e envie para a IA
 * 
 * O que mostra:
 * - Caminho real absoluto do projeto no servidor
 * - Document root do Apache/Nginx
 * - Versão do PHP e extensões disponíveis
 * - Se a pasta config/database.php existe
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "<h2>Passo 1 — Diagnóstico do Servidor</h2>";

echo "<p><strong>__DIR__ (pasta real do arquivo):</strong><br>";
echo __DIR__;
echo "</p>";

echo "<p><strong>DOCUMENT_ROOT:</strong><br>";
echo $_SERVER['DOCUMENT_ROOT'] ?? 'Não encontrado';
echo "</p>";

echo "<p><strong>SCRIPT_FILENAME:</strong><br>";
echo $_SERVER['SCRIPT_FILENAME'] ?? 'Não encontrado';
echo "</p>";

echo "<p><strong>REQUEST_URI:</strong><br>";
echo $_SERVER['REQUEST_URI'] ?? 'Não encontrado';
echo "</p>";

echo "<p><strong>PHP_VERSION:</strong><br>";
echo PHP_VERSION;
echo "</p>";

echo "<p><strong>Extensões carregadas (úteis):</strong><br>";
$exts = ['pdo', 'pdo_mysql', 'mysqli', 'json', 'mbstring', 'gd', 'curl', 'zip', 'openssl'];
foreach ($exts as $ext) {
    echo ($ext . ': ' . (extension_loaded($ext) ? '✓' : '✗')) . "<br>";
}

echo "<hr>";

echo "<h3>Próximo passo</h3>";
echo "<p>Se o arquivo <strong>config/database.php</strong> foi encontrado acima, vá para o Passo 3 (teste_conexao.php).</p>";
echo "<p>Se <strong>não</strong> foi encontrado, vá para o Passo 2 (criar config/database.php).</p>";

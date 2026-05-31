<?php
/*
============================================================
OACR 7.0 — MINI MEMORIAL
Arquivo  : /caminho/completo/do/arquivo.php
Funcao   : O que este endpoint faz em uma linha.
Perfis   : Quem pode chamar (ex: admin, usuario_padrao)
Banco    : Banco e tabelas (ex: banco_principal > tabela_a, tabela_b)
Depende  : Helpers ou includes necessários (ex: _bootstrap.php)
Risco    : baixo | medio | alto
Memoria  : como_trabalhar/MAPA_TECNICO.md#nome-do-modulo
Criado   : YYYY-MM-DD
Alterado : YYYY-MM-DD — o que mudou
============================================================
*/

// INTERVALO 01 — BOOTSTRAP
// Inicialização, includes, conexão com banco
// FIM INTERVALO 01

// INTERVALO 02 — VALIDACAO
// Verificação de sessão, papel e permissões
/* BLOCO OACR: validacao-permissao
   Responsabilidade: bloquear acesso não autorizado antes de qualquer lógica
   Não alterar sem revisar também: _bootstrap.php */
// FIM BLOCO OACR: validacao-permissao
// FIM INTERVALO 02

// INTERVALO 03 — LOGICA PRINCIPAL
// Lógica de negócio, queries, montagem da resposta
// ANCORA: ponto-de-extensao
// Inserir aqui novas lógicas quando o módulo crescer
// FIM ANCORA
// FIM INTERVALO 03

// INTERVALO 04 — RESPOSTA
// Formatação e envio do JSON de resposta
// FIM INTERVALO 04

/*
CAMPOS DO CABECALHO — referencia:

Arquivo  : caminho completo no servidor (ajuda a localizar via FTP/grep)
Funcao   : uma linha — se precisar de mais, o arquivo está fazendo demais
Perfis   : quem PODE chamar — o backend deve validar, não só o front
Banco    : banco > tabelas separadas por vírgula
Depende  : arquivos que este PHP inclui ou que devem existir para funcionar
Risco    : baixo (consulta), medio (escrita), alto (delete/migração/permissão)
Memoria  : onde encontrar documentação técnica completa deste módulo
Alterado : atualizar a cada mudança relevante com data e descrição curta

INTERVALOS — dividem o arquivo em regiões nomeadas (obrigatório em arquivos > 100 linhas)
BLOCOS     — marcam lógica com regra de negócio importante dentro de um intervalo
ANCORAS    — identificam pontos exatos de extensão futura
*/

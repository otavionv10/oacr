# OACR 7.0 — Método de Trabalho com IA em Projetos de Software

**OACR** é um método criado para que equipes e IAs trabalhem juntas em projetos reais
sem perder contexto entre sessões, sem quebrar o que funciona e sem precisar explicar
tudo do zero toda vez que uma nova sessão começa.

As iniciais são pessoais — criadas pelo autor do método.

---

## O Ciclo OACR

```
O — Observar      : Ler as memórias e o código real antes de decidir qualquer coisa.
A — Ancorar       : Identificar exatamente o que será alterado e onde.
C — Compatibilizar: Fazer a menor alteração possível, preservando o que funciona.
R — Registrar     : Atualizar as memórias antes de encerrar. Sempre.
```

Simples de enunciar. A diferença está na disciplina de aplicar — especialmente o **R**.

---

## O Problema que o OACR Resolve

Quando você trabalha com IA em sessões separadas, três problemas aparecem:

1. **Perda de contexto** — a IA perde o fio e você repete as mesmas explicações toda vez
2. **Invenção de código** — a IA supõe nomes de tabelas, rotas e campos que não existem
3. **Reversão de decisões** — algo decidido semanas atrás é desfeito por engano

O OACR resolve os três com um sistema de **memória operacional estruturada** — arquivos
que a IA lê no início de cada sessão e atualiza antes de encerrar.

---

## Arquitetura de Memória em Camadas

A memória do projeto é organizada em quatro camadas com propósitos distintos:

```
projeto/
├── como_trabalhar/          ← NÃO vai para produção
│   │
│   ├── [Camada 0 — Porta de entrada]
│   │   └── START_HERE.md        ← único arquivo que você precisa encontrar
│   │
│   ├── [Camada 1 — Sessão atual]  (muda toda sessão)
│   │   ├── SESSION.md            ← ponte entre sessões — lido primeiro, atualizado por último
│   │   └── TAREFAS.md           ← lista viva de pendências
│   │
│   ├── [Camada 2 — Estrutura]    (muda quando o sistema muda)
│   │   ├── IDENTIDADE.md        ← o que é o projeto, para quem serve
│   │   ├── MODULOS.md           ← mapa de módulos: status, arquivos, tabelas, regra crítica
│   │   ├── REGRAS.md            ← regras invioláveis do projeto
│   │   ├── ACESSO.md            ← banco, APIs, deploy — scripts prontos
│   │   ├── OACR.md              ← o método aplicado a este projeto
│   │   ├── PRIORIDADES.md       ← você escreve, IA lê (arquivo do humano)
│   │   ├── FLUXOS.md            ← como cada operação funciona
│   │   ├── MAPA_USUARIO.md      ← visão simples de cada tela (base para manual)
│   │   ├── MAPA_TECNICO.md      ← endpoints, banco e retorno de cada tela (para a IA)
│   │   └── REGRAS_ACESSO.md     ← quem acessa o quê e por quê
│   │
│   └── [Camada 3 — Histórico]    (consulta pontual)
│       ├── LOG.md               ← registro técnico de cada alteração
│       ├── DIARIO.md            ← história narrativa das decisões
│       └── DECISOES.md          ← decisões que não devem ser revertidas sem motivo
│
└── [código do projeto]
```

**Princípio central:** leia na ordem das camadas. Não pule para a camada 3
sem antes verificar que a camada 1 não tem a resposta.

---

## Três Tipos de Arquivo por Dono

Uma inovação do OACR 7.0 é separar explicitamente quem é responsável por cada arquivo:

| Tipo | Quem escreve | O que acontece |
|---|---|---|
| **Do humano** | Você edita diretamente | IA lê e respeita sem questionar |
| **Compartilhado** | Você descreve, IA mantém | Ambos entendem, IA atualiza |
| **Técnico (IA)** | IA mantém atualizado | Você consulta quando necessário |

**Exemplos práticos:**
- `PRIORIDADES.md` — você edita quando quer mudar o foco. Na próxima sessão a IA já sabe.
- `TAREFAS.md` — você marca o que concluiu, a IA registra o que implementou.
- `SESSION.md` — a IA escreve, você lê se quiser saber onde parou.

---

## SESSION.md — A Peça Central

O `SESSION.md` é o arquivo mais importante do método. Máximo 30 linhas.

```markdown
## Sessão: YYYY-MM-DD

### Última ação realizada
O que foi feito objetivamente.

### Próxima ação — comece aqui
O que fazer exatamente ao abrir na próxima sessão.

### Arquivos tocados nesta sessão
- caminho/arquivo1.php
- caminho/arquivo2.html

### Bloqueio ou dúvida em aberto
Descrever, ou "Nenhum".

### Aguardando do usuário
Ação manual necessária, ou "Nada".
```

**Regra absoluta:** SESSION.md é o **primeiro** arquivo lido ao abrir o projeto
e o **último** atualizado antes de encerrar. Sem exceção.

---

## O OACR como Índice no Código

Todo arquivo relevante ganha um cabeçalho OACR — não para documentar tudo,
mas para **apontar onde está a documentação completa**.

### Cabeçalho PHP

```php
<?php
/*
============================================================
OACR 7.0 — MINI MEMORIAL
Arquivo  : /caminho/completo/arquivo.php
Funcao   : O que este endpoint faz em uma linha.
Perfis   : Quem pode chamar (ex: admin, usuario_padrao)
Banco    : Banco e tabelas (ex: banco_principal > tabela_a, tabela_b)
Depende  : Helpers ou includes necessários
Risco    : baixo | medio | alto
Memoria  : como_trabalhar/MAPA_TECNICO.md#nome-do-modulo
Criado   : YYYY-MM-DD
Alterado : YYYY-MM-DD — o que mudou
============================================================
*/
```

### Cabeçalho HTML

```html
<!--
============================================================
OACR 7.0 — MINI MEMORIAL
Arquivo  : /caminho/completo/pagina.html
Funcao   : O que esta página faz em uma linha.
Perfis   : Quem acessa esta página
APIs     : GET  /api/modulo/list.php
           POST /api/modulo/save.php
Fluxo    : como_trabalhar/FLUXOS.md#fluxo-N
Memoria  : como_trabalhar/MAPA_TECNICO.md#nome-do-modulo
Criado   : YYYY-MM-DD
Alterado : YYYY-MM-DD — o que mudou
============================================================
-->
```

O campo **`Memoria:`** é a inovação do 7.0 — ao lê-lo, a IA sabe exatamente onde
ir para entender o módulo completo sem reler o código inteiro.

---

## INTERVALOS, BLOCOS e ÂNCORAS

Para arquivos PHP longos, o OACR usa três marcadores dentro do código:

### INTERVALOS — regiões grandes

Dividem o arquivo em seções nomeadas. Facilitam navegação e edição cirúrgica.

```php
// INTERVALO 01 — BOOTSTRAP
// ... código de inicialização ...
// FIM INTERVALO 01

// INTERVALO 02 — HELPERS
// ... funções auxiliares ...
// FIM INTERVALO 02

// INTERVALO 03 — QUERY PRINCIPAL
// ... lógica de banco ...
// FIM INTERVALO 03
```

### BLOCOS OACR — zonas de responsabilidade

Dentro de um intervalo, marcam um bloco com responsabilidade específica.
Úteis para indicar à IA onde uma lógica começa e termina.

```php
/* BLOCO OACR: validacao-permissao
   Responsabilidade: verificar se o usuário tem acesso antes de prosseguir
   Não alterar sem atualizar também: _bootstrap.php */
$papel = $_SESSION['papel'] ?? null;
if (!in_array($papel, ['admin', 'operacao'])) {
    http_response_code(403);
    exit(json_encode(['ok' => false, 'error' => 'sem_permissao']));
}
/* FIM BLOCO OACR: validacao-permissao */
```

### ÂNCORAS — pontos exatos de edição

Marcam o lugar exato onde algo deve ser inserido ou alterado.
Eliminam ambiguidade em arquivos grandes.

```php
// ANCORA: adicionar-novo-campo-select
// Inserir aqui novos campos no SELECT quando a tabela crescer
$s[] = 'e.nome';
$s[] = 'e.cidade';
// FIM ANCORA
```

**Quando usar cada um:**
- INTERVALOS → sempre, em qualquer PHP com mais de 100 linhas
- BLOCOS → quando uma lógica tem regra de negócio importante
- ÂNCORAS → quando um ponto de extensão precisa ser identificável

---

## Dois Mapas do Sistema

Para cada módulo/tela, o OACR mantém dois arquivos complementares:

**`MAPA_USUARIO.md`** — linguagem simples, para humanos:
> "Ao clicar em 'Salvar', o sistema valida os campos e grava o empreendimento."

**`MAPA_TECNICO.md`** — linguagem técnica, para a IA:
> "Evento: submit #form-emp → POST /api/empreendimentos/save.php → banco.empreendimentos INSERT/UPDATE → retorna { ok, id }"

O `MAPA_USUARIO.md` vira o manual de uso no futuro.
O `MAPA_TECNICO.md` elimina engenharia reversa a cada sessão.

---

## Regras de Comportamento da IA

Uma IA trabalhando com OACR 7.0 deve:

- Ler `SESSION.md` **primeiro**, sempre — antes de qualquer outra coisa
- Ler `PRIORIDADES.md` logo depois — para saber o que importa agora
- Nunca inventar tabela, coluna, rota, enum ou permissão sem evidência no código ou banco
- Fazer a menor alteração possível — não refatorar fora do escopo da tarefa
- Respeitar INTERVALOS e BLOCOS existentes — editar dentro deles, não ao redor
- Atualizar `SESSION.md` como **último passo** antes de encerrar — sempre
- Em conflito entre documentos: código real > banco real > DECISOES.md > demais

**Anti-guessing protocol:** quando uma informação não está disponível, perguntar
ou buscar no código/banco — nunca assumir.

---

## Checklist de Encerramento de Sessão

Antes de dizer que terminou:

- [ ] Menor alteração possível — não mexeu em mais do que precisava
- [ ] Sintaxe validada quando aplicável
- [ ] `LOG.md` atualizado com o que mudou
- [ ] `TAREFAS.md` atualizado com status das tarefas
- [ ] `MODULOS.md` atualizado se algum módulo mudou de estado
- [ ] `SESSION.md` atualizado — último passo, obrigatório
- [ ] Usuário informado: o que mudou, o que foi validado, o que falta testar

---

## Templates

A pasta `templates/` contém arquivos prontos para copiar e adaptar:

| Template | Para quê |
|---|---|
| `START_HERE.md` | Porta de entrada do projeto |
| `SESSION.md` | Ponte entre sessões |
| `PRIORIDADES.md` | Arquivo do humano — foco e prioridades |
| `FLUXOS.md` | Como cada operação funciona |
| `MAPA_USUARIO.md` | Visão simples de cada tela |
| `MAPA_TECNICO.md` | Visão técnica de cada tela para a IA |
| `OACR_header.php` | Cabeçalho padrão para arquivos PHP |
| `OACR_header.html` | Cabeçalho padrão para arquivos HTML |

---

## Por que 7.0?

| Versão | Novidade principal |
|---|---|
| 6.0 | Método aplicado também à memória operacional (não só ao código) |
| 7.0 | Arquitetura de memória em camadas + SESSION obrigatório + três tipos de dono + dois mapas + campo `Memoria:` no cabeçalho como índice |

---

## Licença

MIT — use, adapte e compartilhe.

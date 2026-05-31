# OACR — Método de Trabalho com IA em Projetos de Software

**OACR** é um método criado para que equipes e IAs trabalhem juntas em projetos reais
sem perder contexto, sem quebrar o que funciona e sem precisar explicar tudo do zero
a cada nova sessão.

As iniciais são pessoais — criadas pelo autor do método.

---

## O Ciclo OACR

```
O — Observar      : Ler as memórias e evidências reais antes de decidir qualquer coisa.
A — Ancorar       : Identificar exatamente o que será alterado e onde.
C — Compatibilizar: Fazer a menor alteração possível, preservando o que funciona.
R — Registrar     : Atualizar as memórias antes de encerrar. Sempre.
```

Simples de enunciar. A diferença está na disciplina de aplicar — especialmente o **R**.

---

## O Problema que o OACR Resolve

Quando você trabalha com IA em sessões separadas, três coisas acontecem:

1. A IA perde o contexto e você repete as mesmas explicações toda vez
2. A IA faz suposições e "inventa" código que parece certo mas quebra algo
3. Decisões técnicas tomadas semanas atrás são revertidas por engano

O OACR resolve isso com um sistema de **memória operacional** — arquivos que a IA lê
no início de cada sessão e atualiza antes de encerrar.

---

## Arquitetura de Memória em Camadas

O método organiza a documentação em camadas com propósitos distintos:

### Camada 0 — Porta de Entrada
Um único arquivo (`START_HERE.md`) que qualquer IA ou pessoa abre primeiro.
Contém o resumo do projeto, a tabela "leia isso para cada situação" e as regras
invioláveis em formato de lista rápida.

**Princípio:** se você só puder ler um arquivo, que seja este.

### Camada 1 — Memória de Sessão (muda toda sessão)
- `SESSION.md` — a ponte entre sessões. Máximo 30 linhas. Responde: o que foi feito, qual é a próxima ação exata, o que está bloqueado.
- `TAREFAS.md` — lista viva de pendências, em andamento e concluídas.

**Princípio:** ler `SESSION.md` em 30 segundos já dá 80% do contexto.

### Camada 2 — Memória Estrutural (muda quando o sistema muda)
- `IDENTIDADE.md` — o que é o projeto, para quem serve, modelo de negócio
- `MODULOS.md` — mapa de todos os módulos: status, arquivos, tabelas, regra crítica
- `REGRAS.md` — regras invioláveis do projeto
- `ACESSO.md` — como acessar banco, APIs, deploy — scripts prontos
- `OACR.md` — o método em si e o formato de cabeçalho

### Camada 3 — Memória Histórica (consulta pontual)
- `LOG.md` — registro técnico de cada alteração
- `DIARIO.md` — história narrativa das decisões
- `DECISOES.md` — decisões que não devem ser revertidas sem motivo

---

## Três Tipos de Arquivo por Dono

Uma inovação central do OACR é separar quem é responsável por cada arquivo:

| Tipo | Quem escreve | Quem lê | Exemplos |
|---|---|---|---|
| **Do humano** | Você | IA respeita | `PRIORIDADES.md`, planilha de regras |
| **Compartilhado** | Ambos | Ambos | `FLUXOS.md`, `MAPA_USUARIO.md`, `TAREFAS.md` |
| **Técnico (IA)** | IA mantém | Você consulta | `SESSION.md`, `MAPA_TECNICO.md`, `LOG.md` |

Quando você edita `PRIORIDADES.md`, na próxima sessão a IA já sabe o que é importante
— sem briefing, sem repetição.

---

## O OACR como Índice no Código

Todo arquivo de código relevante ganha um cabeçalho OACR — não para documentar tudo,
mas para **apontar onde está a documentação completa**.

```php
/*
============================================================
OACR — MINI MEMORIAL
Arquivo  : /caminho/do/arquivo.php
Funcao   : O que este endpoint faz em uma linha.
Perfis   : Quem pode chamar (ex: admin, usuario_padrao)
Banco    : Banco e tabelas usadas
Depende  : Helpers ou includes necessários
Memoria  : como_trabalhar/MAPA_TECNICO.md#nome-do-modulo
Criado   : YYYY-MM-DD
Alterado : YYYY-MM-DD — o que mudou
============================================================
*/
```

```html
<!--
============================================================
OACR — MINI MEMORIAL
Arquivo  : /caminho/da/pagina.html
Funcao   : O que esta página faz em uma linha.
Perfis   : Quem acessa esta página
APIs     : Endpoints que esta página consome
Fluxo    : como_trabalhar/FLUXOS.md#fluxo-N
Memoria  : como_trabalhar/MAPA_TECNICO.md#nome-do-modulo
Criado   : YYYY-MM-DD
Alterado : YYYY-MM-DD — o que mudou
============================================================
-->
```

Ao ler o cabeçalho, a IA sabe exatamente onde buscar mais informação — sem engenharia reversa.

---

## Dois Mapas do Sistema

O método propõe dois arquivos complementares para documentar cada tela/módulo:

**`MAPA_USUARIO.md`** — linguagem simples, para humanos:
> "Ao clicar em 'Carregar lista', o sistema busca os itens e exibe na tabela."

**`MAPA_TECNICO.md`** — linguagem técnica, para a IA:
> "Evento: clique em #btn-carregar → fetch GET /api/modulo/list.php → tabela WHERE conta_id = sessão → retorna { ok, rows: [...] }"

O `MAPA_USUARIO.md` pode virar um manual de uso no futuro.
O `MAPA_TECNICO.md` elimina a necessidade de a IA reler o código toda vez.

---

## Regras de Comportamento da IA

Uma IA trabalhando com OACR deve:

- Ler `SESSION.md` primeiro, sempre
- Não inventar tabela, coluna, rota ou permissão sem evidência no código ou banco
- Fazer a menor alteração possível para resolver o problema
- Não refatorar fora do escopo da tarefa
- Atualizar `SESSION.md` como último passo antes de encerrar — sempre
- Em conflito entre documentos: código real > banco real > DECISOES.md > demais arquivos

---

## Estrutura de Pastas Sugerida

```
projeto/
├── como_trabalhar/              ← sistema de memória (não vai para produção)
│   ├── START_HERE.md            ← porta de entrada
│   ├── SESSION.md               ← ponte entre sessões
│   ├── TAREFAS.md               ← pendências ativas
│   ├── IDENTIDADE.md            ← o que é o projeto
│   ├── MODULOS.md               ← mapa dos módulos
│   ├── REGRAS.md                ← regras invioláveis
│   ├── ACESSO.md                ← banco, APIs, deploy
│   ├── OACR.md                  ← o método
│   ├── PRIORIDADES.md           ← você escreve, IA lê
│   ├── FLUXOS.md                ← como cada operação funciona
│   ├── MAPA_USUARIO.md          ← visão simples de cada tela
│   ├── MAPA_TECNICO.md          ← visão técnica de cada tela
│   └── REGRAS_ACESSO.md         ← quem acessa o quê e por quê
│
├── historico/                   ← logs e diário (consulta pontual)
│   ├── LOG.md
│   ├── DIARIO.md
│   └── DECISOES.md
│
└── [código do projeto]
```

---

## Templates

A pasta `templates/` contém arquivos prontos para copiar e adaptar ao seu projeto.

---

## Por que funciona

O método não inventa uma nova forma de programar. Ele resolve um problema específico:
**a descontinuidade entre sessões de trabalho com IA**.

Cada elemento tem um propósito claro:
- `SESSION.md` existe porque a IA perde contexto entre sessões
- `REGRAS.md` existe porque decisões técnicas são revertidas por engano
- O cabeçalho OACR existe porque a IA faz engenharia reversa desnecessária
- `PRIORIDADES.md` existe porque o humano precisa manter o controle do que importa

Quando todos os elementos estão preenchidos, a IA abre o projeto e sabe exatamente
onde está, o que fazer e o que não pode quebrar — sem perguntar.

---

## Licença

MIT — use, adapte e compartilhe.

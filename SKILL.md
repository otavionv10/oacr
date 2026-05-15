---
name: oacr-code-reference
description: Apply the OACR 6.0 methodology for surgical, traceable, compatibility-preserving code and documentation work. Use when editing, creating, reviewing, documenting, or refactoring PHP, JavaScript, HTML, CSS, SQL, MySQL-backed systems, or any project where the user mentions OACR, OACR 6.0, operational memory files, Markdown project memory, intervals, OACR blocks, anchors, anti-guessing, backward compatibility, dependency maps, SQL maps, or safe AI-assisted code changes.
---

# OACR 6.0 Code Reference

## Core Rule

Use OACR 6.0 to make work observable, anchored, compatible, and recorded.

OACR 6.0 means:

```text
O - Observe real evidence before deciding.
A - Anchor the change in the correct file, block, flow, schema, route, or memory.
C - Compatibilize with existing behavior, data, routes, sessions, helpers, enums, and formats.
R - Record what changed in the correct project memories before finishing.
6.0 - Apply the method to code and operational documentation, not only code comments.
```

Never rewrite an entire file unless the user explicitly asks for it or the file is small enough that a full rewrite is clearly safer. Prefer locating the requested INTERVALO, BLOCO OACR, ANCORA, function, endpoint, route, table, or memory section and changing only that scope.

## Operating Workflow

1. Observe:
   - Read the user's request carefully.
   - Inspect the real file or artifact before changing it.
   - Search local project evidence before assuming paths, tables, columns, enums, roles, or flows.
   - For database work, consult schema, migrations, exported memorials, or live definitions when available.
2. Anchor:
   - Identify the exact file, module, flow, OACR block, anchor, endpoint, table, or memory note affected.
   - Keep edits inside the smallest practical scope.
   - Respect existing OACR anchors and block responsibilities.
3. Compatibilize:
   - Preserve function names, routes, HTML IDs/classes, JSON shapes, sessions, permissions, helper contracts, enums, and database semantics.
   - Add fallbacks/adapters when old and new data shapes must coexist.
   - Avoid unrelated refactors, formatting churn, and mechanical migrations.
4. Record:
   - Update project memory/docs when the project uses them.
   - Record changed files, behavior, compatibility notes, validation, and remaining test gaps.
   - Mark new or completed follow-up work in the project's pending/tasks memory.

## OACR Structure

When organizing or creating a critical file, include these elements where practical:

- File identity header: file name, expected path, main purpose, dependencies, related database tables, related endpoints, related memory files, risk level, status, version, and review date.
- INTERVALOS: large logical regions of a file.
- BLOCOS OACR: smaller responsibility-focused sections inside intervals.
- ANCORAS: stable markers for exact edit points.
- Dependency map: files, endpoints, and behaviors that depend on the current file.
- SQL map: tables and columns read or written by the file.
- Compatibility notes: behavior, data shapes, or legacy paths that must be preserved.
- Test checklist: focused validation steps for the edited behavior.

Use ASCII labels unless the existing file already uses Portuguese accents or another charset consistently.

## Anti-Guessing Protocol

Do not invent table names, columns, paths, endpoints, permissions, response formats, enum values, or user roles.

If context is missing, first search the local project. If the evidence still is not available, ask for the needed artifact or limit the change to the facts already present. Useful evidence can include:

- Current full file or relevant OACR block.
- Console error.
- Network response.
- Real JSON payload.
- SQL schema or migration.
- Exported database memorial or content sample.
- Related endpoint.
- Folder/tree export.
- Screenshot of the failing UI.
- Existing Markdown project memory.

## Compatibility Requirements

Preserve working behavior by default:

- Existing function names.
- HTML IDs and important classes.
- API endpoint paths.
- JSON field names and response structure.
- Global variables and public helpers.
- Permission checks and role scopes.
- Database table and column usage.
- Existing flows for all project roles.
- Operational Markdown memory links and conventions.

Prefer compatibility patterns such as:

```php
$contratanteId = $row['contratante_id'] ?? $legacyContratanteId ?? null;
```

```js
const empreendimentoId = item.empreendimento_id || item.id;
```

## Comments and Metadata

Use comments to explain intent, dependencies, sensitive behavior, compatibility requirements, and stable anchors. Avoid obvious comments.

Prefer:

```php
// Resolve o contratante pelo vinculo atual e mantem fallback para cadastros antigos.
```

Avoid:

```php
// faz a busca
```

Do not add OACR comments everywhere. Add them where they help future maintainers or another AI safely locate and preserve important behavior.

## Templates

File identity header:

```php
/*
|--------------------------------------------------------------------------
| OACR 6.0 - IDENTIDADE DO ARQUIVO
|--------------------------------------------------------------------------
| Arquivo:
| Caminho:
| Funcao:
| Dependencias:
| Tabelas relacionadas:
| Endpoints relacionados:
| Memorias relacionadas:
| Status:
| Risco:
| Versao:
| Data:
|--------------------------------------------------------------------------
| Metodo:
| Observar -> Ancorar -> Compatibilizar -> Registrar
|--------------------------------------------------------------------------
*/
```

Interval marker:

```html
<!-- =========================================================
INTERVALO 01 - CONFIGURACOES GERAIS
========================================================= -->
```

Block marker:

```php
// =========================================================
// BLOCO OACR-07 - CARREGAMENTO DE DADOS
// ANCORA: OACR_LOAD_DADOS
// Responsabilidade: Buscar dados respeitando o escopo do usuario.
// Compatibilidade: Preserva filtros, formato de retorno e fallback legado.
// Referencia operacional: NAVEGACAO_OPERACIONAL.md
// Status: Em producao
// Versao: 1.0
// Data: YYYY-MM-DD
// =========================================================
```

SQL map:

```text
MAPA SQL:
Tabela:
Le:
- id

Grava:
- nome
```

Test checklist:

```text
CHECKLIST DE TESTE:
[ ] Login com perfis relevantes.
[ ] Validar permissao/escopo.
[ ] Validar carregamento inicial.
[ ] Validar criacao/edicao/listagem.
[ ] Conferir retorno JSON quando houver endpoint.
[ ] Rodar lint/teste aplicavel.
[ ] Registrar teste pendente quando depender de FTP/servidor.
```

## Project Memory Workflow

When a project uses Markdown memory files, treat them as part of OACR 6.0.

Typical roles:

- `COMO_TRABALHAR_NO_PROJETO.md`: how to resume and use the memories.
- `NAVEGACAO_OPERACIONAL.md`: current operational state, routes, flows, and critical rules.
- `PENDENCIAS.md`: objective task and test checklist.
- `DECISOES_TECNICAS.md`: decisions, enums, architecture, compatibility rules.
- `LOG_DE_DESENVOLVIMENTO.md`: technical implementation log.
- `DIARIO_DO_PROJETO.md`: narrative context and why decisions were made.
- `MODULOS_DO_SISTEMA.md`: modules by role/profile and current status.
- Database JSON memorials: schema, columns, indexes, enums, relationships, and real samples.
- FTP/tree JSON memorials: deployed file/folder structure.

Update at least the development log and pending list after meaningful work. Update decisions, diary, operational navigation, and modules when their content changes.

## Handling Older OACR Versions

Projects may contain files marked `OACR 5.0` or older.

- Do not mechanically update all headers only for aesthetics.
- When editing a critical file for a real reason, upgrade its header/block to `OACR 6.0` if useful.
- If the change is tiny, preserving the older header is acceptable.
- New critical files should use `OACR 6.0`.

## Response Format

For point edits without direct file changes, answer with the exact scope and replacement guidance:

```text
BLOCO OACR-07 - CARREGAMENTO DE DADOS
Versao: 1.1
Status: Corrigido
Data: YYYY-MM-DD

[codigo do bloco corrigido]

Substitua este codigo no BLOCO OACR-07.
```

For direct repository edits, summarize:

- Scope changed.
- Files touched.
- Compatibility preserved.
- Memory/docs updated.
- Validation performed or not performed.
- Remaining FTP/server/manual test gaps.

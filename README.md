# OACR 6.0

OACR — Open AI Code Reference — e uma metodologia para trabalhar com IA em codigo e documentacao operacional sem perder rastreabilidade, compatibilidade e controle do projeto.

## Ciclo OACR 6.0

```text
O - Observar evidencias reais antes de decidir.
A - Ancorar a alteracao no arquivo, bloco, fluxo, schema, rota ou memoria correta.
C - Compatibilizar com o que ja funciona, preservando rotas, sessoes, helpers, enums e formatos.
R - Registrar o que mudou nas memorias certas antes de encerrar.
6.0 - Aplicar o metodo tambem a documentacao operacional, nao apenas aos comentarios de codigo.
```

## Para que serve

- Evitar que a IA reescreva arquivos inteiros sem necessidade.
- Reduzir adivinhacao sobre tabelas, colunas, endpoints e regras.
- Preservar compatibilidade com comportamento existente.
- Criar comentarios, blocos e ancoras que ajudam humanos e IAs futuras.
- Manter memorias Markdown atualizadas durante a evolucao do projeto.

## Skill

A skill principal esta em [`SKILL.md`](SKILL.md).

Ela pode ser usada por Codex/IA como guia para edicao cirurgica de codigo, revisao, documentacao, refatoracao controlada, mapas SQL, blocos OACR, ancoras e continuidade de projeto por arquivos de memoria.

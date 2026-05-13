---
name: oacr
description: "OACR (Open AI Code Reference): metodologia para edição cirúrgica de código com IA usando intervalos, blocos e âncoras. Criado por Otávio."
license: MIT
compatibility: opencode
---

## OACR — Open AI Code Reference

**Criado por Otávio** — Metodologia própria para programadores que querem usar IA sem perder o controle do código.

### Pra que serve?

Toda pessoa que já usou IA pra mexer em código grande sabe o problema: você pede uma alteração simples e a IA reescreve o arquivo inteiro, quebra funções que estavam funcionando, inventa nomes de tabelas que não existem, e você passa mais tempo corrigindo do que programando.

O OACR resolve isso com **coordenadas de edição**: intervalos, blocos e âncoras. A IA sabe exatamente *onde* mexer e *o que* preservar.

### Princípios

1. **Edição cirúrgica** — nunca reescrever um arquivo inteiro. Localizar o bloco certo e alterar só ele.
2. **Compatibilidade retroativa** — não quebrar o que já funciona. Criar pontes/adaptadores quando precisar mudar algo.
3. **Antiadivinhação** — sem contexto suficiente, a IA não inventa. Ela pede evidências ou trabalha só com o que foi fornecido.
4. **Rastreabilidade** — todo bloco tem número, versão, data e responsabilidade documentada.

### Estrutura de um arquivo OACR

```
IDENTIDADE DO ARQUIVO  →  nome, caminho, função, risco, versão
INTERVALO 01           →  grande região lógica (ex: "CONFIGURAÇÕES")
  BLOCO OACR-01        →  responsabilidade específica + âncora
  BLOCO OACR-02        →  responsabilidade específica + âncora
INTERVALO 02           →  próxima região (ex: "HTML PRINCIPAL")
  BLOCO OACR-03        →  responsabilidade específica + âncora
MAPA SQL               →  tabelas e colunas lidas/gravadas
DEPENDÊNCIAS           →  arquivos, endpoints e tabelas relacionados
CHECKLIST DE TESTE     →  roteiro de validação
```

### Preparação do ambiente — Como me enviar o contexto certo

**Regra de ouro:** Eu só consigo acertar se você me der o contexto certo. Sem ele, vou ter que adivinhar — e adivinhação gera erro.

Se você **já tem o projeto rodando**, vá direto para o **Passo 4** (memorial do banco) e me envie o JSON + o arquivo que quer alterar.

Se você **está começando um projeto novo**, siga os 4 passos abaixo na ordem.

---

#### PASSO 1 — Descobrir o caminho do servidor

Crie um arquivo `caminho.php` na raiz do projeto com este conteúdo:

> **Modelo:** [caminho.php](skill:oacr/templates/caminho.php)

1. Faça upload do `caminho.php` para a raiz do seu servidor
2. Acesse ele no navegador (ex: `https://seudominio.com.br/caminho.php`)
3. **Copie TUDO que aparecer na tela e me envie**

Eu vou saber o caminho real do projeto, versão do PHP e extensões disponíveis.

---

#### PASSO 2 — Criar a conexão com o banco

Crie o arquivo `config/database.php` com os dados do seu banco:

> **Modelo:** [database.php](skill:oacr/templates/database.php)

1. Crie a pasta `config/` na raiz do projeto
2. Salve o arquivo e preencha apenas: `$db_host`, `$db_name`, `$db_user`, `$db_pass`
3. Se já tem esse arquivo, só verifique se as credenciais estão corretas

---

#### PASSO 3 — Testar a conexão

Crie o arquivo `teste_conexao.php` na raiz do projeto:

> **Modelo:** [teste_conexao.php](skill:oacr/templates/teste_conexao.php)

1. Faça upload para a raiz do servidor
2. Acesse no navegador (ex: `https://seudominio.com.br/teste_conexao.php`)
3. **Copie TUDO e me envie**

Vou saber se a conexão funciona, qual banco está conectado e quais tabelas existem.

---

#### PASSO 4 — Gerar o memorial do banco (JSON)

Crie o arquivo `gerar_memorial.php` na raiz do projeto:

> **Modelo:** [gerar_memorial.php](skill:oacr/templates/gerar_memorial.php)

1. Faça upload para a raiz do servidor
2. Acesse no navegador (ex: `https://seudominio.com.br/gerar_memorial.php`)
3. Clique em **"Baixar JSON do Memorial"**
4. **Me envie o arquivo JSON baixado**

Este JSON contém a estrutura COMPLETA do banco: todas as tabelas, colunas, tipos, chaves — eu nunca vou precisar adivinhar nomes de colunas.

---

#### Depois dos 4 passos

Agora sim, me envie também:
- **O arquivo que você quer que eu altere** (conteúdo completo)
- **Qual a tarefa específica** que você precisa (ex: "criar tela de cadastro", "corrigir bug no relatório")
- **URLs de endpoints** se for uma tela que consome API

> **Lembre-se:** Investir 5 minutos nessa preparação evita horas de correção depois.

### Como usar com a IA

**Pedido bom:**
> "Substitua apenas o BLOCO OACR-07 — CARREGAMENTO DE EMPREENDIMENTOS. Preserve todo o resto."

**Pedido ruim:**
> "Altera a tela de empreendimentos pra mim" (IA vai adivinhar e provavelmente errar)

### Por que funciona?

Programadores bons pensam em **estrutura** antes de escrever código. O OACR formaliza essa estrutura de um jeito que a IA entende. Em vez de um mar de texto, o arquivo vira um mapa com pontos de referência claros. Qualquer programador — independente do nível — consegue abrir um arquivo OACR e saber:
- O que esse arquivo faz
- Onde cada parte está
- O que pode e o que não pode ser alterado
- Qual o risco de mexer aqui
- O que mais precisa ser testado depois

### Sobre o criador

O OACR foi criado por **Otávio**, desenvolvedor que percebeu que o maior gargalo no trabalho com IA não é a IA — é a falta de organização do código. O método nasceu da prática, de horas debugando alterações que a IA fez sem contexto suficiente. É um padrão vivo, que evolui com o uso.

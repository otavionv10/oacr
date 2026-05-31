# START HERE
# [Nome do Projeto]

> Este é o ÚNICO arquivo que você precisa encontrar.
> Ele aponta para tudo. Leia do início ao fim antes de qualquer ação.

---

## O que é este projeto
[Descrição em 2-3 linhas. Stack, propósito, quem usa.]
Detalhes completos: `IDENTIDADE.md`

---

## LEIA AGORA — dependendo da sua situação

| Situação | O que ler primeiro |
|---|---|
| Abrindo uma nova sessão | `SESSION.md` → `PRIORIDADES.md` → `TAREFAS.md` |
| Vou mexer em um módulo | `SESSION.md` → `MODULOS.md` → abrir o arquivo real |
| Preciso entender como um fluxo funciona | `FLUXOS.md` |
| Vou alterar permissão ou acesso | `REGRAS_ACESSO.md` |
| Vou mexer no banco de dados | `ACESSO.md` → `REGRAS.md` |
| Vou fazer deploy | `ACESSO.md` (seção deploy) |
| Não sei o que o sistema faz | `IDENTIDADE.md` → `MODULOS.md` |
| Preciso entender o método OACR | `OACR.md` |
| Preciso de histórico | Ver pasta `historico/` |

---

## Regras que nunca podem ser quebradas
[Liste aqui as 3-6 regras mais críticas do seu projeto. Exemplos:]

```
1. [Regra de segurança crítica do seu sistema]
2. [Regra de banco de dados — ex: sempre filtrar por tenant_id]
3. [Regra de compatibilidade — ex: não renomear endpoints sem ponte]
4. [Regra de deploy — ex: pasta X nunca vai para produção]
```

---

## Mapa dos arquivos de memória

### Arquivos do dono do projeto (você escreve, IA lê e respeita)
| Arquivo | O que é |
|---|---|
| `PRIORIDADES.md` | O que focar agora e no próximo ciclo |
| [planilha ou outro arquivo visual] | [descrição] |

### Arquivos compartilhados (você entende, IA mantém atualizado)
| Arquivo | O que é |
|---|---|
| `FLUXOS.md` | Como executar as operações principais |
| `MAPA_USUARIO.md` | O que cada tela faz — linguagem simples |
| `MAPA_TECNICO.md` | Endpoints, banco e retorno de cada tela |
| `REGRAS_ACESSO.md` | Quem acessa o quê e por quê |
| `MODULOS.md` | Mapa de todos os módulos |
| `TAREFAS.md` | Pendências ativas |

### Arquivos técnicos (IA mantém, você consulta quando necessário)
| Arquivo | O que é |
|---|---|
| `SESSION.md` | Ponte entre sessões |
| `IDENTIDADE.md` | O que é o projeto |
| `REGRAS.md` | Regras invioláveis detalhadas |
| `ACESSO.md` | Banco, APIs, deploy — scripts prontos |
| `OACR.md` | O método |

---

## Encerrar sessão — checklist mínimo
- [ ] `SESSION.md` — o que foi feito, próxima ação, arquivos tocados
- [ ] `TAREFAS.md` — status das tarefas alteradas
- [ ] `MODULOS.md` — se algum módulo mudou de estado

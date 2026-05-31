# MAPA TÉCNICO DE PÁGINAS
# Documentação back-end de cada tela — para uso da IA

> Para a visão do usuário (o que ele vê e faz), ver MAPA_USUARIO.md.
> Para os fluxos completos, ver FLUXOS.md.

Atualizado: YYYY-MM-DD

---

## Convenção de documentação

Cada módulo segue este formato:

```
### NOME DO MÓDULO

**Tela principal:** caminho do HTML
**Auth / Bootstrap:** arquivo que valida sessão e papel

#### Fluxo: [nome da ação]
- Evento    : o que o usuário faz (ex: clica em "Carregar")
- Chama     : endpoint PHP chamado
- Arquivo   : caminho completo do PHP
- Método    : GET ou POST
- Params    : parâmetros enviados
- Banco     : nome do banco
- Tabelas   : tabelas consultadas
- Retorna   : formato do JSON de resposta
- Observação: regras de negócio ou filtros importantes
```

---

## MÓDULO: Autenticação

**Arquivo central:** /api/auth/me.php
**Usado por:** TODAS as páginas protegidas

#### Fluxo: verificar sessão
- Evento    : página carrega
- Chama     : /api/auth/me.php
- Método    : GET (com credentials: 'include')
- Retorna   :
  ```json
  {
    "ok": true,
    "user": { "id": 1, "nome": "...", "email": "..." },
    "role": "nome_do_papel",
    "papeis": ["nome_do_papel"]
  }
  ```
- Se não autenticado: ok=false → redirecionar para login

---

## [ADICIONAR MÓDULOS CONFORME O PROJETO FOR SENDO MAPEADO]

<!--
DICA: Mapear por prioridade — comece pelos módulos mais usados.
A cada módulo mapeado, adicionar campo Memoria: no cabeçalho OACR
do arquivo PHP/HTML correspondente apontando para esta seção.
-->

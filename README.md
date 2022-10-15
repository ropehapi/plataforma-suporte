### Plataforma suporte

Desenvolvido em 2022, o [SistemaSuporte]("https://github.com/ropehapi/SistemaSuporte") é uma plataforma que visa solucionar demandas de suporte.

### Funcionalidades
- Cadastro de tickets
- Atendimento online
- Base de conhecimento

### Entidades
- HelpDesk
  - Empresa
  - Usuário
    - Três perfis de acesso:
      - Gestor
      - Suporte
      - Cliente
  - Ticket
    - Ticket 
    - Dados do ticket
    - Tabelas de controle
      - Setores
      - Categoria
      - Classificação
      - Status

### Estrutura
- Backend
    - PHP v8.1.2
    - Laravel v9.35.1
- Front-end
    - Bootstrap
    - Jquery
    - [Template AdminLTE3](https://github.com/jeroennoten/Laravel-AdminLTE)

### Instalação
- `$ git clone https://github.com/ropehapi/SistemaSuporte`
- `$ composer update`
- `$ php artisan migrate`

### Observações
-Estruturar banco se baseando no que já existe do MySuite

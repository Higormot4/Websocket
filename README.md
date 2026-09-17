# ChatLaravelPusher

Aplicação de chat em tempo real construída com **Laravel 12**, usando o pacote **[Chatify](https://github.com/munafio/chatify)** para a interface e a lógica de mensagens, e o **Pusher** como serviço de broadcasting para entregar as mensagens em tempo real. Autenticação de usuários feita com **Laravel Breeze**.

## Funcionalidades

- Autenticação de usuários (registro, login, verificação de e-mail, recuperação de senha) via Laravel Breeze
- Chat privado entre usuários em tempo real (Pusher)
- Envio de mensagens com anexos/arquivos
- Marcar conversas como favoritas
- Busca de contatos e conversas
- Compartilhamento de fotos na conversa
- Status de "ativo" do usuário (online/offline)
- Modo escuro e cor do "messenger" configuráveis por usuário
- Apagar mensagens e conversas

## Tecnologias

- **Backend:** PHP 8.2+, Laravel 12
- **Chat:** [munafio/chatify](https://github.com/munafio/chatify) ^1.6
- **Broadcasting em tempo real:** Pusher
- **Autenticação:** Laravel Breeze
- **Frontend:** Blade, Tailwind CSS, Alpine.js, Vite
- **Banco de dados:** SQLite por padrão (pode ser trocado por MySQL/PostgreSQL)
- **Testes:** Pest

## Requisitos

- PHP >= 8.2
- Composer
- Node.js e NPM
- Uma conta no [Pusher](https://pusher.com) (App ID, Key, Secret e Cluster)

## Instalação

1. Clone o repositório e instale as dependências PHP:

   ```bash
   composer install
   ```

2. Instale as dependências JavaScript:

   ```bash
   npm install
   ```

3. Copie o arquivo de ambiente e gere a chave da aplicação:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configure o banco de dados no `.env` (por padrão usa SQLite — crie o arquivo se necessário):

   ```bash
   touch database/database.sqlite
   ```

5. Configure as credenciais do **Pusher** no `.env`:

   ```env
   BROADCAST_CONNECTION=pusher

   PUSHER_APP_ID=seu_app_id
   PUSHER_APP_KEY=sua_app_key
   PUSHER_APP_SECRET=seu_app_secret
   PUSHER_APP_CLUSTER=mt1
   ```

6. Rode as migrations (criam as tabelas de usuários, mensagens e favoritos do Chatify):

   ```bash
   php artisan migrate
   ```

7. Publique os assets do Chatify (se ainda não estiverem em `public/`):

   ```bash
   php artisan chatify:publish
   ```

8. Compile os assets do frontend:

   ```bash
   npm run build
   ```

## Executando o projeto

Em desenvolvimento, é possível subir o servidor, a fila, os logs e o Vite juntos com um único comando (definido no `composer.json`):

```bash
composer run dev
```

Ou manualmente:

```bash
php artisan serve
npm run dev
```

A aplicação estará disponível em `http://localhost:8000`. O chat do Chatify fica acessível na rota configurada em `CHATIFY_ROUTES_PREFIX` (padrão: `/chatify`).

## Estrutura relevante

- `app/Models/ChMessage.php`, `app/Models/ChFavorite.php` — modelos das mensagens e favoritos do chat
- `config/chatify.php` — configurações do Chatify (rotas, Pusher, upload de arquivos etc.)
- `routes/chatify/` — rotas web e API do módulo de chat
- `database/migrations/` — migrations de usuários e das tabelas do Chatify (mensagens, favoritos, avatar, status ativo, modo escuro, cor do messenger)

## Testes

O projeto usa Pest para testes:

```bash
composer test
```


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ChatLaravel - Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f0fdf4;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 700px;
            background: #ffffff;
            border-radius: 18px;
            padding: 35px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 35px;
        }

        .logo {
            color: #15803d;
            font-size: 25px;
            font-weight: bold;
        }

        .user {
            color: #64748b;
            font-size: 14px;
        }

        h1 {
            color: #166534;
            font-size: 30px;
            margin-bottom: 12px;
        }

        .description {
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .chat-card {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 14px;
            padding: 25px;
            margin-bottom: 25px;
        }

        .chat-card h2 {
            color: #166534;
            font-size: 21px;
            margin-bottom: 10px;
        }

        .chat-card p {
            color: #64748b;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .button {
            display: inline-block;
            background: #16a34a;
            color: white;
            text-decoration: none;
            padding: 13px 22px;
            border-radius: 9px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .button:hover {
            background: #15803d;
        }

        .logout {
            background: #fee2e2;
            color: #b91c1c;
            padding: 10px 16px;
        }

        .logout:hover {
            background: #fecaca;
        }

        @media (max-width: 500px) {
            .container {
                padding: 25px;
            }

            .header {
                align-items: flex-start;
                flex-direction: column;
            }

            h1 {
                font-size: 25px;
            }
        }
    </style>
</head>
<body>

    <main class="container">

        <header class="header">
            <div class="logo">
                ChatLaravel
            </div>

            <div class="user">
                Olá, {{ Auth::user()->name }}!
            </div>
        </header>

        <h1>Bem-vindo ao sistema! 👋</h1>

        <p class="description">
            Aqui você pode conversar com outros usuários
            utilizando nosso sistema de mensagens em tempo real.
        </p>

        <section class="chat-card">
            <h2>💬 Chat em tempo real</h2>

            <p>
                Acesse o ambiente de conversas e envie mensagens
                para outros usuários cadastrados.
            </p>

            <a href="{{ url('/chatify') }}" class="button">
                Acessar o Chat
            </a>
        </section>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="button logout">
                Sair da conta
            </button>
        </form>

    </main>

</body>
</html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libro de Visitas</title>
    <style>
        body {
             font-family: Arial, sans-serif;
             background: #f7f7f7; 
             margin: 0; 
             padding: 0; 
        }

        .container { 
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 2px 8px #0001;
            }

        h2 { 
            margin-top: 32px;
        }

        form > div {
            margin-bottom: 16px;
        }

        label { 
            display: block;
            margin-bottom: 4px;
            font-weight: bold;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background: #3490dc;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover { 
            background: #2779bd;
        }
        
        ul { list-style: none;
            padding: 0;
        }

        li { 
            background: #f1f1f1;
            margin-bottom: 8px;
            padding: 10px;
            border-radius: 4px;
        }

        .alert-success { 
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 16px;
        }

        .pagination { 
            margin-top: 16px;
        }

        .pagination .active span { 
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Libro de Visitas</h1>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('visitor-log.store') }}" method="POST">
            @csrf
            <div>
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="message">Mensaje:</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <button type="submit">Enviar</button>
            <a href="{{ url('/') }}">
                <button type="button" style="margin-left: 10px;">Volver al inicio</button>
            </a>
        </form>

        @if ($messages->count())
            <h2>Mensajes Registrados</h2>
        @endif
        <ul>
            @foreach ($messages as $message)
                <li><strong>{{ $message->name }}</strong>: {{ $message->message }}</li>
            @endforeach
        </ul>

        <div class="pagination">
            {{ $messages->links() }}
        </div>
    </div>
</body>
</html>
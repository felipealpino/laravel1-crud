<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') administrativo</title>
</head>
<body>

    {{-- LAYOUT GENERICO (OUTROS ARQUIVOS ESTÃO HERDANDO ESSES LAYOUTS E SUBSTITUINDO O @yield('nome_escolhido')) --}}

    <header>
        <h1>Header</h1>
    </header>

    <hr>

    <section>
        @yield('content')
    </section> <br>

    <hr>

    <footer>
        rodape
    </footer> 


</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="/js/main.js"></script>
    <link rel="stylesheet" href="/css/styles.css">
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>




</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark sticky-top" data-aos="fade-down" data-aos-delay="500">
            <div class="collapse navbar-collapse" id="navbar">
                <div class="logo">
                    <a href="/" class="navbar-brand">
                        <img src="/img/logotag.png" alt="logo">
                    </a>
                </div>
                <div class="navbar-nav">
                    <ul class="navbar-nav">
                        @auth
                            <li class="nav-item">
                                <a href="/events/createProject" class="nav-link">Postar projetos</a>
                            </li>
                            <li class="nav-item">
                                <a href="/projetos" class="nav-link">Meus projetos</a>
                            </li>
                            <form class="logout" action="/logout" method="POST">
                                @csrf
                                <li class="nav-item">
                                    <a href="/logout" class="nav-link"
                                        onclick="event.preventDefault();
                                                                                                                                                                        this.closest('form').submit();">
                                        Sair</a>
                                </li>
                            </form>


                        @endauth
                    </ul>
                    <ul display="block" class="navbar-nav">
                        @guest
                            <li class="nav-item">
                                <a href="/login" class="nav-link">Login</a>
                            </li>
                        @endguest
                    </ul>

                </div>
            </div>

        </nav>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
                @if(session('msg'))
                    <p id="message" class="msg">{{ session('msg') }}</p>
                @endif
                @yield('content')
            </div>
        </div>
    </main>

</body>


<script>
    AOS.init();
</script>

</html>
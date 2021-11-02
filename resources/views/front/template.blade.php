<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Stephane Costa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<body id="body">
    <nav id="nav" class="nav-menu">
        <ul>    
            <li><a href="{{ route('stephane.index') }}">Accueil</a></li>
            @foreach($categories as $category)
                <li><a href="{{ route('stephane.front.category.index', $category->name) }}">{{$category->name}}</a></li>
            @endforeach
        </ul>

        <p class="login"><a href="{{ route('login') }}">
            @if(Auth::check())
            <i class="fas fa-user pr-2"></i>Dashboard
            @else
            <i class="fas fa-user pr-2"></i>Connexion
            @endif
        </a></p>
    </nav>
    <div id="menu" class="menu" onclick="openMenu()">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="logo">
        Stephane <br>
        Costa
    </div>

    <div class="arrow">
        <i class="fas fa-arrow-down"></i>
    </div>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>

    <script>
        var opened = false;
        function openMenu()
        {
            if(opened == false)
            {
                var burger = document.getElementById('menu');
                burger.classList.toggle('opened');

                var nav = document.getElementById('nav');
                nav.classList.toggle('open');
            }
            else
            {
                var burger = document.getElementById('menu');
                burger.classList.toggle('opened');

                var image = document.getElementById('image-bigger');
                image.classList.toggle('d-none');

                if(image.classList.contains('d-none'))
                {
                    var body = document.getElementById('body');
                    body.style.overflow = "visible";
                    opened = false;
                }
            }
        }

    </script>
</body>
</html>
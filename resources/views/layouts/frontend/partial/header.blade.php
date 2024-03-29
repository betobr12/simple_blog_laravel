<header>
    <div class="container-fluid position-relative no-side-padding">

        <a href="{{route('home')}}" class="logo">Blogfolio</a>

        <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

        <ul class="main-menu visible-on-click" id="main-menu">
        <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{ route('post.index') }}">Posts</a></li>
            @guest
            <li><a href="{{ route('login') }}">Acessar</a></li>

            @else

            @if(Auth::user()->role->id == 1)
            <li><a href="{{ route('admin.dashboard') }}">Painel de Controle</a></li>
            @endif

            @if(Auth::user()->role->id == 2)
            <li><a href="{{ route('author.dashboard') }}">Painel de Controle</a></li>
            @endif

            @endguest
        </ul><!-- main-menu -->

        <div class="src-area">
            <form method="GET" action="{{ route('search') }}">
                <button class="src-btn" value="{{ isset($query) ? $query : '' }}" type="submit"><i class="ion-ios-search-strong"></i></button>
                <input class="src-input" name="query" type="text" placeholder="Pequisar..">
            </form>
        </div>

    </div><!-- conatiner -->
</header>

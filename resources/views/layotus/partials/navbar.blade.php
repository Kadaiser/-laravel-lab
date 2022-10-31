<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">eDomus</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link {{Auth::check() ? 'active' : 'disabled'}}" aria-current="page" href="{{ route('tasks.index')}}">Tareas</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('categories.index')}}">Categorias</a>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" href="#">Dashboard</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <strong>{{auth()->user()->username}}</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Dashboard</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/logout">Close session</a></li>
                    </ul>
                </li>
                @endauth
            
                @guest
                <li class="nav-item dropdown dropdown-menu-end">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <strong>Anonymus</strong>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/login">Sign In</a></li>
                        <li><a class="dropdown-item" href="/register">Sign Up</a></li>
                    </ul>
                </li>
                @endguest  
            </ul>
        </div>
    </div>
</nav>
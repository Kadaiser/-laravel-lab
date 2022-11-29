<nav class="navbar navbar-expand-lg sticky-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-success" href="/home">LocalDomus</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!--
                <li class="nav-item">
                    <a class="nav-link {{Auth::check() ? 'active' : 'disabled'}}" aria-current="page" href="{ route('tasks.index')}">Tareas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{ route('categories.index')}">Categorias</a>
                </li>
                -->
                <li class="nav-item">
                    <a class="nav-link text-success" aria-current="page" href="{{route('chirps.index')}}">MicroBlog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-success" aria-current="page" href="{{route('buildings.index')}}">Edificios</a>
                </li>
                <li class="nav-item disabled">
                    <a class="nav-link text-success" aria-current="page" href="">Flota</a>
                </li>
                <li class="nav-item disabled">
                    <a class="nav-link text-success" aria-current="page" href="">Personal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-success" href="/dashboard">Dashboard</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">
                @auth
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle text-success" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <strong>{{auth()->user()->username}}</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item text-success" href="#">{{auth()->user()->getRole()}}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-success" href="#">Profile</a></li>
                        <li><a class="dropdown-item text-success" href="#">Dashboard</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-success" href="/logout">Close session</a></li>
                    </ul>
                </li>
                @endauth
            
                @guest
                <li class="nav-item dropdown dropdown-menu-end">
                    <a class="nav-link dropdown-toggle text-success" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <strong>Anonymus</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item text-success" href="/login">Sign In</a></li>
                        <li><a class="dropdown-item text-success" href="/register">Sign Up</a></li>
                    </ul>
                </li>
                @endguest  
            </ul>

        </div>
    </div>
</nav>
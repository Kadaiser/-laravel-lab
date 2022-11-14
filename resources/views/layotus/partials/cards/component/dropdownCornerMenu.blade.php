
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{$titleCard}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Actions</a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item resize-item" data-resize-container="s" href="#">Small</a></li>
                        <li><a class="dropdown-item resize-item" data-resize-container="m" href="#">Medium</a></li>
                        <li><a class="dropdown-item resize-item" data-resize-container="l" href="#">Large</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item discard-item" href="#">Discard Card</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

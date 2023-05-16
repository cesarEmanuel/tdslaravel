@props(['signin', 'signup'])

<nav
    class="navbar navbar-expand-lg blur border-radius-lg  shadow  mt-4 py-2  mx-4 mb-5">
    <div class="container-fluid ps-2 pe-0">
        
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>

        
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" style="justify-content: space-between;"id="navbar">
            <h2 >
                Freefiles
            </h2>
            <ul class="navbar-nav justify-content-end">
                @auth
                
                @else
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                        href="{{ route('dashboard') }}">
                        <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ route($signup) }}">
                        <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                        Registrarse
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ route($signin) }}">
                        <i class="fas fa-key opacity-6 text-dark me-1"></i>
                        Ingresar
                    </a>
                </li>
                @endauth
            </ul>
            
        </div>
    </div>
</nav>

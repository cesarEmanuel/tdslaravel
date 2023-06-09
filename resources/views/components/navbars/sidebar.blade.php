@props(['activePage'])

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard.index') }} ">
            <span class="ms-2 font-weight-bold text-white">FREEFILES</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'user-profile' ? 'active bg-gradient-primary' : '' }} "
                    href="{{ route('user-profile') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-user-circle ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Editar Perfil</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'dashboard' ? 'active bg-gradient-primary' : '' }} "
                    href="{{ route('dashboard.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-file ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Mis archivos</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a class="btn bg-gradient-primary w-100" href="{{route('allfiles')}}" >Archivos publicos</a>
        </div>
    </div>
</aside>

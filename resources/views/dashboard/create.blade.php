<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="Subir archivo"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Subir archivo'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Subir archivo</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        @if (session('status'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('status') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10"
                                    data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @endif
                        @if (Session::has('demo'))
                                <div class="row">
                                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                        <span class="text-sm">{{ Session::get('demo') }}</span>
                                        <button type="button" class="btn-close text-lg py-3 opacity-10"
                                            data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                        @endif
                        <form action="{{(isset($datafile)?route('dashboard.update',$datafile['id']):route('dashboard.store'))}}" method="post" enctype="multipart/form-data"> 
                            @csrf
                            @method((isset($datafile)?'PUT':'POST'))
                            <div class="row">
                                <div class="col-12">
                                  <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Nombre de archivo</label>
                                    <input type="text" class="form-control" name="displayname"
                                    value='{{(isset($datafile->displayfile)?$datafile->displayfile:'') }}'>
                                </div>
                                <div class="col-12">
                                    <div class="input-group input-group-outline my-3">
                                        <input type="file" name="file">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="statusfile" 
                                        value="Publicado"
                                        id="flexSwitchCheckDefault" {{(isset($datafile->statusfile)&&$datafile->statusfile=='Publicado'?'checked="checked"':'') }}>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Publico</label>
                                    </div>
                                </div>
                                  <button type="submit" class="btn bg-gradient-primary">Subir archivo</button>
                            </div>
            
            
            
                            {{-- <input type="file" name="file">
                            <input type="checkbox" name="statusfile" value="publicado">
                            <input type="submit" value="Subir archivo"> --}}
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>

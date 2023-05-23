<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="dashboard"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='dashboard'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('assets') }}/img/profile.png" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ auth()->user()->name }}
                            </h5>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        {{-- <form action="/upload" class="dropzone" id="dropzone">
                        </form> --}}
                        <div class="card">
                            <div class="card-body">
                                <form action="/create" method="post" enctype="multipart/form-data"> 
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                          <div class="input-group input-group-outline my-3">
                                            <label class="form-label">Nombre de archivo</label>
                                            <input type="text" class="form-control" name="displayfile">
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group input-group-outline my-3">
                                                <input type="file" name="file">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked="">
                                                <label class="form-check-label" name="statusfile"for="flexSwitchCheckDefault">Publico</label>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">Archivos subidos</h6>
                                </div>
                                
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Archivo</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Fecha</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Estado</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Tamano</th>
                                                    <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    No. Descargas</th>
                                                <th class="text-secondary opacity-7">
                                                    Borrar
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($archivos AS $values)

                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <span class="material-icons">
                                                                {{$values["icon"]}}
                                                            </span>
                                                            <a href="{{ asset('files/'.$values["namefile"]) }}"
                                                                target="_blank"
                                                                class="nameFile">{{$values["displayfile"]}}</a>
                                                        </div>
                                                        
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{$values["created_at"]}}</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-success">{{$values["statusfile"]}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{$values["sizefile"]}}MB</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{$values["contador"]}}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="javascript:;"
                                                    class="edit-button"
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Editar nombre">
                                                        <span class="material-icons">
                                                            edit
                                                        </span>
                                                    </a>
                                                    <a href="javascript:;"
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Borrar archivo">
                                                        <span class="material-icons">
                                                            delete_forever
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>
    @push('js')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            Dropzone.autoDiscover = false;
            var myDropzone = new Dropzone("#dropzone", {
                            url: "/upload",
                            paramName: "file",
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            init: function() {
                                var myDropzone = this;
                                myDropzone.on("addedfile", function(file) {
                                    var displayName = document.getElementById("display-name-input").value;
                                    file.displayname = displayName;
                                });
                                myDropzone.on("sending", function(file, xhr, formData) {
                                    formData.append("displayname", file.displayname);
                                });
                            }
                        });
        const updateDisplayName = (fileId, displayName) => {
            return new Promise((resolve, reject) => {
                axios.post('/update-display-name', {
                    file_id: fileId,
                    display_name: displayName
                })
                .then(response => {
                    if (response.data.success) {
                        resolve();
                    } else {
                        reject();
                    }
                })
                .catch(error => {
                    reject(error);
                });
            });
        };
            const editButton = Array.from(document.getElementsByClassName('edit-button'));
            const updateButton = document.getElementById('update-button');
            const displayNameInput = document.getElementById('display-name-input');
            const fileId = 123;
            console.log(editButton);
            editButton.forEach(element => {
                element.addEventListener('click',()=>{
                    this.parentNode.querySelector('.nameFile');
                })
            });
            updateButton.addEventListener('click', () => {
                const displayName = displayNameInput.value;

                updateDisplayName(fileId, displayName)
                    .then(() => {
                        console.log('Display name updated successfully');
                    })
                    .catch(error => {
                        console.error('Error updating display name:', error);
                    });
            });
    
        </script>
    @endpush

</x-layout>

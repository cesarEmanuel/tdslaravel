<x-layout bodyClass="">
    
    <div class="min-vh-100"
        style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    <x-navbars.navs.guest signup='register' signin='login'></x-navbars.navs.guest>
                </div>
            </div>
        </div>
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            
            <div class="card">
                    
                <div class="table-responsive">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Archivo</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Autor</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fecha de subida</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Descargar</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($archivos AS $values)

                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        
                                        <span class="text-secondary text-xs font-weight-bold">
                                          {{$values["displayfile"]}}</span>
                                    </div>
                                    
                                </div>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{$values["autor"]}}</span>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{$values["created_at"]}}</p>
                            </td>
                            <td class="align-middle text-center">
                              <span class="material-icons">
                                {{$values["icon"]}}
                            </span>
                            
                                <span class="text-secondary text-xs font-weight-bold">

                                  <a href="{{ asset('files/'.$values["namefile"]) }}"
                                            target="_blank"
                                            class="nameFile"><span class="material-icons">
                                              download
                                          </span></a>
                                  </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                </div>
              
              
        </div>
    </div>
        <x-footers.guest></x-footers.guest>
</x-layout>

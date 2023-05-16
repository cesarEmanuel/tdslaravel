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
                        <tr>
                            <td>
                              <div class="d-flex px-2 ">
                                <div>
                                  <i class="material-icons">picture_as_pdf </i>
                                </div>
                                <div class="my-auto">
                                  <h6 class="mb-0 text-xs">Acta de independencia</h6>
                                </div>
                              </div>
                            </td>
                            <td>
                              <p class="text-xs font-weight-normal mb-0">Palacio de Guatemala </p>
                            </td>
                            <td>
                              <span class="badge badge-dot me-4">
                                <i class="bg-info"></i>
                                <span class="text-dark text-xs">12 oct 2002</span>
                              </span>
                            </td>
                            <td class="align-middle text-center">
                              <div class="d-flex align-items-center">
                                <span class="me-2 text-xs">Descargar <i class="material-icons">cloud_download</i></span>
                              </div>
                            </td>
                  
                           
                          </tr>
              
                    </tbody>
                  </table>
                </div>
                </div>
              
              
        </div>
    </div>
        <x-footers.guest></x-footers.guest>
</x-layout>

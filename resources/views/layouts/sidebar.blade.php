
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard-pro/pages/dashboards/default.html " target="_blank">
            <img src="{{asset('assets/img/logos/LOGOAT_800x200.webp')}}" class="navbar-brand-img h-100" alt="main_logo">
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link" aria-controls="dashboardsExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="fa fa-home text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">INICIO</span>
                </a>
                <a data-bs-toggle="collapse" href="#dashboardsExamples" class="nav-link" aria-controls="dashboardsExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-delivery-fast text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">DOMICILIOS</span>
                </a>
                <!-- MENÚ DOMICILIOS -->
                <div class="collapse" id="dashboardsExamples">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link " href="../../pages/dashboards/landing.html">
                                <span class="sidenav-mini-icon"> L </span>
                                <span class="sidenav-normal"> Sin asignar </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../pages/dashboards/default.html">
                                <span class="sidenav-mini-icon"> D </span>
                                <span class="sidenav-normal"> Asignados </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../../pages/dashboards/automotive.html">
                                <span class="sidenav-mini-icon"> A </span>
                                <span class="sidenav-normal"> Terminados </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../../pages/dashboards/smart-home.html">
                                <span class="sidenav-mini-icon"> S </span>
                                <span class="sidenav-normal"> Crear domicilio </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- FIN DOMICILIOS -->

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#pagesExamples" class="nav-link " aria-controls="pagesExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="fa fa-motorcycle text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">MENSAJEROS</span>
                </a>
                <div class="collapse " id="pagesExamples">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link " href="../../pages/pages/pricing-page.html">
                                <span class="sidenav-mini-icon"> P </span>
                                <span class="sidenav-normal"> Sin servicios </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../../pages/pages/rtl-page.html">
                                <span class="sidenav-mini-icon"> R </span>
                                <span class="sidenav-normal"> Con servicios </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../../pages/pages/widgets.html">
                                <span class="sidenav-mini-icon"> W </span>
                                <span class="sidenav-normal"> Ináctivos </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#applicationsExamples" class="nav-link " aria-controls="applicationsExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="fa fa-group text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">CLIENTES</span>
                </a>
                <div class="collapse " id="applicationsExamples">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link " href="../../pages/applications/kanban.html">
                                <span class="sidenav-mini-icon"> K </span>
                                <span class="sidenav-normal"> Clientes </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../../pages/applications/wizard.html">
                                <span class="sidenav-mini-icon"> W </span>
                                <span class="sidenav-normal"> Sedes </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../../pages/applications/datatables.html">
                                <span class="sidenav-mini-icon"> D </span>
                                <span class="sidenav-normal"> Áreas </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#ecommerceExamples" class="nav-link " aria-controls="ecommerceExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-settings text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">CONFIGURACIÓN</span>
                </a>
                <div class="collapse " id="ecommerceExamples">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link " href="../../pages/ecommerce/overview.html">
                                <span class="sidenav-mini-icon"> U </span>
                                <span class="sidenav-normal"> Usuarios </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " aria-expanded="false" href="#productsExample">
                                <span class="sidenav-mini-icon"> D </span>
                                <span class="sidenav-normal"> Domicilios <b class="caret"></b></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../../pages/ecommerce/referral.html">
                                <span class="sidenav-mini-icon"> G </span>
                                <span class="sidenav-normal"> General </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer mx-3 my-3">
        <div class="card card-plain shadow-none" id="sidenavCard">
        </div>
        <a href="{{route('logout')}}" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">Cerrar sesión</a>
    </div>
</aside>

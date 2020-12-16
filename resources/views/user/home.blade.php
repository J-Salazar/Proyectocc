<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />



    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="{{url('/user/home')}}">CC V</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item disabled" href="#">Settings</a>
                <a class="dropdown-item disabled" href="#">Activity Log</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('/user/logout') }}"
                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ url('/user/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Proyectos
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">

                            @foreach($clientes as $cliente)

                            <a class="nav-link" href="{{url('/user/verproyecto/'.$cliente->id)}}">{{ $cliente->cliente }}</a>
                            @endforeach
                        </nav>
                    </div>
                    <!--Id usuario
                    @auth
                        {{auth()->user()->id}}
                    @endauth
                    -->

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Stakeholders
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{url('/user/verstakeholder/'.auth()->user()->id)}}">Mi equipo</a>
                            <a class="nav-link" href="{{url('/user/crearstakeholder/'.auth()->user()->id)}}">Agregar Stakeholder</a>
                        </nav>
                    </div>
                    <a class="nav-link" href="{{url('/user/crearhistoria/'.auth()->user()->id)}}"  data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Historia de Usuarios

                    </a>


                </div>
            </div>

        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Clientes</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"> </li>
                </ol>

                <div class="card ">
                    <div class="card-header col-12">
                        <p class="">
                            <i class="fas fa-table mr-1"></i>
                            <span>Registro de clientes</span>


                        <button class="btn-primary text-right" style="position: absolute; right: 2%; border-radius: 8px !important;">
                            <a class="text-decoration-none text-white" href="{{url('user/crearcliente')}}">Crear Cliente</a>
                        </button>
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>RUC</th>
                                    <th>Repr. legal</th>
                                    <th>Telefono</th>
                                    <th>Correo</th>
                                    <th>Proyectos</th>
                                    <th><span> </span> </th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Cliente</th>
                                    <th>RUC</th>
                                    <th>Repr. legal</th>
                                    <th>Telefono</th>
                                    <th>Correo</th>
                                    <th>Proyectos</th>
                                    <th><span> </span> </th>
                                </tr>
                                </tfoot>


                                <tbody>
                                @foreach($clientes as $clientes)
                                    <tr>
                                        <th scope="row">{{ $clientes->cliente }}</th>
                                        <td>{{ $clientes->ruc }}</td>
                                        <td>{{ $clientes->replegal }}</td>
                                        <td>{{ $clientes->telf }}</td>
                                        <td>{{ $clientes->email }}</td>
                                        <td class="">
                                            <button class="btn-primary rounded"><a href="{{url('/user/verproyecto/'.$clientes->id)}}" class="text-white text-decoration-none">Ver Proyecto</a></button>
                                            <button class="btn-primary rounded"><a href="{{url('/user/crearproyecto/'.$clientes->id)}}" class="text-white text-decoration-none">Crear Proyecto</a></button></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Dropdown button
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach


                            </table>
                        </div>
                    </div>
                </div>




            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2020</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="/js/datatables-demo.js"></script>


</body>
</html>

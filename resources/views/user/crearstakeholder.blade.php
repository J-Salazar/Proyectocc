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
                <h1 class="mt-4">Registrar Nuevo Stakeholder</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"> </li>
                </ol>

<span class="invisible">@auth
    {{$num = auth()->user()->id}}
@endauth
</span>
<form class="form-horizontal text-left" role="form" method="POST" action="{{ url('/user/crear_stakeholder/'.$num ) }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
        <label for="nombre" class="control-label">Nombre</label>

        <div class="">
            <input id="nombre" type="string" class="form-control" name="nombre">

            @if ($errors->has('nombre'))
                <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
        <label for="direccion" class="control-label">Direccion</label>

        <div class="">
            <input id="direccion" type="string" class="form-control" name="direccion">

            @if ($errors->has('direccion'))
                <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
        <label for="telefono" class="control-label">Telefono</label>

        <div class="">
            <input id="telefono" type="string" class="form-control" name="telefono">

            @if ($errors->has('telefono'))
                <span class="help-block">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="control-label">Email</label>

        <div class="">
            <input id="email" type="string" class="form-control" name="email">

            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>
    </div>




    <button type="submit" class="btn btn-primary align-items-center">
        <a href="{{url('/user/crear_stakeholder')}}"></a>Register

    </button>
</form>






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

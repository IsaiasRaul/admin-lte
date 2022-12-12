<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                        Administrador
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">

                    <!-- USUARIOS NUEVOS -->
                    <li class="nav-item">
                        <a href="{{ route('users.registrar') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>{{ __('Usuario Nuevo') }}</p>
                        </a>
                    </li>
                    <!-- LISTADO DE USUARIOS -->
                    <li class="nav-item">
                        <a href="{{ route('users.show') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>{{ __('Usuarios') }}</p>
                        </a>
                    </li>

                    <!-- Municipalidades -->
                    <li class="nav-item">
                        <a href="{{ route('muni.municipalidades') }}" class="nav-link">
                            <i class="nav-icon fa fa-university"></i>
                            <p>
                                {{ __('Municipalidades') }}
                            </p>
                        </a>
                    </li>

                </ul>
                
            </li>                                          
            
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                        Mi Municipalidad
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ __('Usuario') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link">
                        <i class="nav-icon far fa-address-card"></i>
                        <p>
                            {{ __('Acerca de la Ley 21.015') }}
                        </p>
                    </a>
                </li>
    
                <li class="nav-item">
                    <a href="{{ route('form') }}" class="nav-link">
                        <i class="nav-icon fa fa-university"></i>
                        <p>
                            {{ __('Reporte Ley 21.015') }}
                        </p>
                    </a>
                </li>                

                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{Auth::user()->avatar}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>@if (Auth::check())
                    {{Auth::user()->name}}
                    @else
                    Guest
                    @endif
                </p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional)
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
         /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->

            <li class="{{ (request()->is('admin')) ? 'active' : '' }}"><a href="/admin"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
            <li class="{{ (request()->is('admin/clientes*')) ? 'active' : '' }}"><a href="/admin/clientes"><i class="fa fa-industry"></i> <span>Clientes</span></a></li>
            <li class="{{ (request()->is('admin/veiculos*')) ? 'active' : '' }}"><a href="/admin/veiculos"><i class="fa fa-car"></i> <span>Veiculos</span></a></li>
            <li class="{{ (request()->is('admin/reparacoes*')) ? 'active' : '' }}"><a href="/admin/reparacoes"><i class="fa fa-wrench"></i> <span>Reparações</span></a></li>
            <li class="{{ (request()->is('admin/users*')) ? 'active' : '' }}"><a href="/admin/users"><i class="fa fa-users"></i> <span>Utilizadores</span></a></li>
            <li class="treeview {{ (request()->is('admin/dynamics*')) ? 'active' : '' }}">
                <a>
                  <i class="fa fa-gears"></i> <span>Configurações</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="/admin/dynamics"><i class="fa fa-circle-o"></i>Tabela Dynamic</a></li>
                </ul>
              </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

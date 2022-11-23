<ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/dashboard')}}">
        <div class="sidebar-brand-icon">
            <img src="{{asset('images/bfar2.png')}}" style="width:60px;" alt="MDC Logo">
        </div>
        <div class="sidebar-brand-text mx-3">CLARIN&#xB7;FARM</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('/dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

        <!-- Heading -->
        <div class="sidebar-heading">
            
        </div>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
                <a class="nav-link" href="{{url('/stock')}}">
                    <i class="fas fa-th"></i>
                        <span>List of Stock</span></a>
             </li>

        <li class="nav-item">
            <a class="nav-link" href="{{url('/all_transaction')}}">
                <i class="fas fa-file-invoice-dollar"></i>
                <span>Transaction</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{url('/customer')}}">
                <i class="fa-solid fa-list"></i>
                <span>Customers</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{url('/production')}}">
                <i class="fas fa-chart-area"></i>
                <span>Production</span></a>
        </li>
        
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline ">
        <button class="rounded-circle border-0" id="sidebarToggle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
        </button>
    </div>
</ul>

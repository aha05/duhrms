<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon mr-2 d-none small">
            <i class="bi bi-person-fill-gear"></i>
        </div>
        <div class="sidebar-brand-text mx-3">DUHRMS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    @if (auth()->user()->userHasRole('Admin'))
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>
        @can('view', Auth::user())
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                    aria-expanded="true" aria-controls="collapseUser">
                    <i class="fa fa-user"></i>
                    <span>User Account</span>
                </a>
                <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="{{ route('account', Auth::user()) }}">All User</a>
                        <a class="collapse-item" href="{{ route('register') }}">Register</a>
                    </div>
                </div>
            </li>
        @endcan

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAuthorization"
                aria-expanded="true" aria-controls="collapseAuthorization">
                <i class="fa fa-user-shield"></i>
                <span>Roles & Permissions</span>
            </a>
            <div id="collapseAuthorization" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Authorization:</h6>
                    <a class="collapse-item" href="{{ route('roles.index') }}"> Create Role</a>
                    <a class="collapse-item" href="{{ route('permissions.index') }}">Permissions</a>
                    <a class="collapse-item" href="{{ route('roles.all') }}">All Roles</a>
                </div>
            </div>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-table"></i>
            <span>Employee Info</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ route('employee') }}">All Employees</a>
                <a class="collapse-item" href="{{ route('register.employee') }}">Register</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('department') }}">
            <i class="fas fa-briefcase"></i>
            <span>Department</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLeave"
            aria-expanded="true" aria-controls="collapseLeave">
            <i class="fas fa-user-times"></i>
            <span>Leave</span>
        </a>
        <div id="collapseLeave" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ route('leave.request.form') }}">Apply Leave</a>
                <a class="collapse-item" href="{{ route('leaves.history') }}">Leave Hestroy</a>
                @if (auth()->user()->userHasRole('Admin'))
                    <a class="collapse-item" href="{{ route('leaves') }}">All Leave</a>
                    <a class="collapse-item" href="{{ route('leave.types') }}">Leave Type</a>
                    <a class="collapse-item" href="{{ route('leave.pending') }}">Pending Leave</a>
                    <a class="collapse-item" href="{{ route('leave.approved') }}">Approved Leave</a>
                    <a class="collapse-item" href="{{ route('leave.rejected') }}">Rejected Leave</a>
                @endif
            </div>
        </div>
    </li>

    @can('view', Auth::user())
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVacany"
                aria-expanded="true" aria-controls="collapseUser">
                <i class="fas fa-suitcase"></i>
                <span>Vacancy</span>
            </a>
            <div id="collapseVacany" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Vacancy Components:</h6>
                    <a class="collapse-item" href="{{ route('vacancy-requests.index') }}">Vacancies</a>
                    <a class="collapse-item" href="{{route('vacancy-requests.create') }}">Apply</a>
                </div>
            </div>
        </li>
    @endcan
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport"
            aria-expanded="true" aria-controls="collapseReport">
            <i class="fas fa-file"></i>
            <span>Report</span>
        </a>
        <div id="collapseReport" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ route('report') }}">Generate Report</a>
                <a class="collapse-item" href="#">View Report</a>
            </div>
        </div>
    </li>

    {{-- <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('chart') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li> --}}

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAnn"
            aria-expanded="true" aria-controls="collapseAnn">
            <i class="fas fa-bullhorn"></i>
            <span>Announcement</span>
        </a>
        <div id="collapseAnn" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ route('report') }}">Post Job</a>
                <a class="collapse-item" href="#">Post Sc.Info</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

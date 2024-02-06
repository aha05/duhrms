<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar" id="sidebar-menu">

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
    @can('view-dashboard')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    @endcan



    @can('view-users-lists')
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('account', Auth::user()) }}">
                <i class="fa fa-user"></i>
                <span>User Account</span></a>
        </li>
    @endcan
    @can('view-roles-lists')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('roles.all') }}">
                <i class="fa fa-user-shield"></i>
                <span>Roles & Permissions</span>
            </a>
        </li>
        <hr class="sidebar-divider">
    @endcan

    <!-- Divider -->


    <!-- Heading -->
    <div class="sidebar-heading">

    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-table"></i>
            <span>Employees</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                @can('view-employees-lists')
                    <a class="collapse-item" href="{{ route('employee') }}">All Employees</a>
                @endcan
                <a class="collapse-item" href="{{ route('employee.profile') }}">Employee Profile</a>
            </div>
        </div>
    </li>
    @can('view-departments-lists')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('department') }}">
                <i class="fas fa-briefcase"></i>
                <span>Department</span></a>
        </li>
    @endcan
    @unless (Auth::user()->userHasRole('Record officer'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLeave"
                aria-expanded="true" aria-controls="collapseLeave">
                <i class="fas fa-user-times"></i>
                <span>Leave</span>
            </a>

            <div id="collapseLeave" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Components:</h6>
                    @unless (Auth::user()->userHasRole('Admin') || Auth::user()->userHasRole('HR officer'))
                        @unless (Auth::user()->userHasRole('DEP officer') || Auth::user()->userHasRole('AC officer'))
                            @can('create-leave-requests')
                                <a class="collapse-item" href="{{ route('leave.request.form') }}">Apply Leave</a>
                            @endcan
                            <a class="collapse-item" href="{{ route('leaves.history') }}">Leave Hestroy</a>
                        @endunless
                    @endunless

                    @can('view-leave-types-lists')
                        <a class="collapse-item" href="{{ route('leave.types') }}">Leave Type</a>
                    @endcan
                    @can(['view-leave-requests-lists', 'view-leave-approvals-lists'])
                        <a class="collapse-item" href="{{ route('leaves') }}">All Leave</a>
                        <a class="collapse-item" href="{{ route('leave.pending') }}">Pending Leave</a>
                        <a class="collapse-item" href="{{ route('leave.approved') }}">Approved Leave</a>
                        <a class="collapse-item" href="{{ route('leave.rejected') }}">Rejected Leave</a>
                    @endcan
                </div>
            </div>
        </li>
    @endunless
    @canany(['create-vacancy-requests', 'view-vacancy-requests-lists', 'view-vacancy-approvals-lists'])
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVacany"
                aria-expanded="true" aria-controls="collapseUser">
                <i class="fas fa-suitcase"></i>
                <span>Vacancy</span>
            </a>
            <div id="collapseVacany" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Vacancy Components:</h6>
                    @canany(['view-vacancy-requests-lists', 'view-vacancy-approvals-lists'])
                        <a class="collapse-item" href="{{ route('vacancy-requests.index') }}">Vacancies</a>
                    @endcanany
                    @can('create-vacancy-requests')
                        <a class="collapse-item" href="{{ route('vacancy-requests.create') }}">Apply</a>
                    @endcan
                </div>
            </div>
        </li>
    @endcanany
    @canany(['view-reports', 'generate-reports'])
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport"
                aria-expanded="true" aria-controls="collapseReport">
                <i class="fas fa-file"></i>
                <span>Report</span>
            </a>
            <div id="collapseReport" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Components:</h6>
                    <a class="collapse-item" href="{{ route('report.employee.info') }}">Employee Information</a>
                    @can('view-reports')
                        <a class="collapse-item" href="{{ route('report.leave.info') }}">Leave Report</a>
                    @endcan
                    @can('generate-reports')
                        <a class="collapse-item" href="{{ route('report') }}">Generate Report</a>
                    @endcan
                </div>
            </div>
        </li>
    @endcanany

    @canany(['view.jobs.table', 'view-notices-table'])
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAnn"
                aria-expanded="true" aria-controls="collapseAnn">
                <i class="fas fa-bullhorn"></i>
                <span>Announcement</span>
            </a>
            <div id="collapseAnn" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Components:</h6>
                    @can('view-jobs-table')
                        <a class="collapse-item" href="{{ route('admin.job.posts') }}">Jobs</a>
                    @endcan
                    @can('view-notices-table')
                        <a class="collapse-item" href="{{ route('admin.notices') }}">Notice</a>
                    @endcan
                </div>
            </div>
        </li>
    @endcanany


    <!-- Nav Item - Charts -->
    @can('view-applicants')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('applicants.index') }}">
                <i class="fas fa-briefcase"></i>
                <span>Applicants</span></a>
        </li>
    @endcan
    @can('view-feedbacks')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.feedback') }}">
                <i class="fas fa-comment"></i>
                <span>Feedback</span></a>
        </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

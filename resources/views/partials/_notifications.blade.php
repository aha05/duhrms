<?php

$value = 0;
if (Auth::check()) {
    if (
        Auth::User()
            ->roles()
            ->first() != null
    ) {
        foreach (Auth::user()->unreadNotifications as $notification) {
            if (
                Auth::User()
                    ->roles()
                    ->first()->name == $notification->data['role']
            ) {
                global $value;
                $value++;
            }
        }
    }
}
?>
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter">
            {{ $value }}+
        </span>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Alerts Center
        </h6>
        <div class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">December 12, 2019</div>
                <span class="font-weight-bold">A new monthly report is ready to download!</span>
            </div>
        </div>
        <div class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-success">
                    <i class="fas fa-donate text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">December 7, 2019</div>
                $290.29 has been deposited into your account!
            </div>
        </div>
        <div class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-warning">
                    <i class="fas fa-exclamation-triangle text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">December 2, 2019</div>
                Spending Alert: We've noticed unusually high spending for your account.

            </div>
        </div>
        @if (Auth::User()->roles()->first() != null)
            @foreach (Auth::user()->unreadNotifications as $notification)
                @if (Auth::User()->roles()->first()->name == $notification->data['role'])
                    <div class="dropdown-item d-flex align-items-center">
                        <div class="mr-3">
                            <div class="icon-circle bg-warning">
                                <i class="fas fa-exclamation-triangle text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">December 2, 2019</div>

                            <span class="col-6" href="">{{ $notification->data['name'] }}</span>
                            <a class="link-primary col-4 text-primary"
                                href="{{ route('markAsRead', $notification->id) }}" onclick="markNotificationAsRead()">
                                MarkasRead</a>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
    </div>
</li>
<script>
    function markNotificationAsRead() {

        $.get('/markAsRead');
    }
</script>

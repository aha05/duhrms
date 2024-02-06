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
<script src="{{ asset('js/axios.min.js') }}"></script>

<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle " href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw shadow"></i>
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
        @if (Auth::User()->roles()->first() != null)
            @foreach (Auth::user()->unreadNotifications as $notification)
                @if (Auth::User()->roles()->first()->name == $notification->data['role'])
                    <div class="dropdown-item d-flex align-items-center">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fa fa-info-circle text-light fs-5"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">{{ $notification->created_at->format('F d, Y') }}</div>

                            <a href="{{ $notification->data['link'] }}" class="link-primary text-primary" id="dataButton" data-value="{{ $notification->id }}"
                                >{{ Str::of(Str::ucfirst(Str::substr($notification->data['link'], 27))) }}</a>
                            <span class="col-6 ms-0 ps-0">{{ $notification->data['name'] }}</span>
                            <a class="link-primary text-primary" href="" id="dataButtonTWo" data-value="{{ $notification->id }}">
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



<script>
    document.getElementById('dataButton').addEventListener('click', function() {
        var value = this.getAttribute('data-value'); // Get the data-value attribute

        // Send AJAX request to the Laravel route
        axios.post('/tempJs', {
                value: value // Pass the value in the request body
            })
            .then(function(response) {
                // Handle the response from the server
                var result = response.data.result;
                // Display or process the result as needed
                console.log(result);
            })
            .catch(function(error) {
                // Handle any errors that occur during the request
                console.error(error);
            });
    });
</script>
<script>
    document.getElementById('dataButtonTWo').addEventListener('click', function() {
        var value = this.getAttribute('data-value'); // Get the data-value attribute

        // Send AJAX request to the Laravel route
        axios.post('/tempJs', {
                value: value // Pass the value in the request body
            })
            .then(function(response) {
                // Handle the response from the server
                var result = response.data.result;
                // Display or process the result as needed
                console.log(result);
            })
            .catch(function(error) {
                // Handle any errors that occur during the request
                console.error(error);
            });
    });
</script>

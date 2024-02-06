@component('mail::message')
    # Leave Approval Notification

    Hello {{ $user->name }},

    Your leave request has been approved.

    @component('mail::button', ['url' => 'https://example.com'])
        View Details
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent

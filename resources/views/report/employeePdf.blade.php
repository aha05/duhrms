<style>
    table {
    caption-side: bottom;
    border-collapse: collapse;
}

.table {
    --bs-table-bg: transparent;
    --bs-table-accent-bg: transparent;
    --bs-table-striped-color: #212529;
    --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
    --bs-table-active-color: #212529;
    --bs-table-active-bg: rgba(0, 0, 0, 0.1);
    --bs-table-hover-color: #212529;
    --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
    vertical-align: top;
    border-color: #dee2e6;
}

.table > :not(caption) > * > * {
    padding: 0.5rem 0.5rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
}
.table > tbody {
    vertical-align: inherit;
}
.table > thead {
    vertical-align: bottom;
}
.table > :not(:last-child) > :last-child > * {
    border-bottom-color: currentColor;
}
.caption-top {
    caption-side: top;
}
.table-sm > :not(caption) > * > * {
    padding: 0.25rem 0.25rem;
}
.table-bordered > :not(caption) > * {
    border-width: 1px 0;
}
.table-bordered > :not(caption) > * > * {
    border-width: 0 1px;
}
.table-borderless > :not(caption) > * > * {
    border-bottom-width: 0;
}
.table-striped > tbody > tr:nth-of-type(odd) {
    --bs-table-accent-bg: var(--bs-table-striped-bg);
    color: var(--bs-table-striped-color);
}
.table-active {
    --bs-table-accent-bg: var(--bs-table-active-bg);
    color: var(--bs-table-active-color);
}
.table-hover > tbody > tr:hover {
    --bs-table-accent-bg: var(--bs-table-hover-bg);
    color: var(--bs-table-hover-color);
}
.table-primary {
    --bs-table-bg: #cfe2ff;
    --bs-table-striped-bg: #c5d7f2;
    --bs-table-striped-color: #000;
    --bs-table-active-bg: #bacbe6;
    --bs-table-active-color: #000;
    --bs-table-hover-bg: #bfd1ec;
    --bs-table-hover-color: #000;
    color: #000;
    border-color: #bacbe6;
}
</style>



@php
use App\Models\Person;

    $person = Person::all();
@endphp
<h2 style="margin-left:3%">Employee data Record</h2>
<table class="table table-hover bordred" style="border: 1px solid #dee2e6 !important;" id="dataTable" width="100%" cellspacing="0">

    <thead class="table-primary">
        <tr>

            <th style="border: 1px solid #dee2e6 !important;">ID</th>
            <th style="border: 1px solid #dee2e6 !important;">First Name</th>
            <th style="border: 1px solid #dee2e6 !important;">Last name</th>
            <th style="border: 1px solid #dee2e6 !important;">Gender</th>
            <th style="border: 1px solid #dee2e6 !important;">Email</th>
            <th style="border: 1px solid #dee2e6 !important;">DOB</th>
            <th style="border: 1px solid #dee2e6 !important;">Phone</th>
            <th style="border: 1px solid #dee2e6 !important;">Salary</th>
            <th style="border: 1px solid #dee2e6 !important;">Dete of hire</th>
            <th style="border: 1px solid #dee2e6 !important;">status</th>
            <th style="border: 1px solid #dee2e6 !important;">Department</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($person as $item)
            <tr style="border: 1px solid #dee2e6 !important;">
                <td style="border: 1px solid #dee2e6 !important;">{{ $item->employee->emp_id ?? '' }}</td>
                <td style="border: 1px solid #dee2e6 !important;">{{ $item->first_name ?? '' }}</td>
                <td style="border: 1px solid #dee2e6 !important;">{{ $item->last_name ?? '' }}</td>
                <td style="border: 1px solid #dee2e6 !important;">{{ $item->gender ?? '' }}</td>
                <td style="border: 1px solid #dee2e6 !important;">{{ $item->email ?? '' }}</td>
                <td style="border: 1px solid #dee2e6 !important;">{{ $item->DOB ?? '' }}</td>
                <td style="border: 1px solid #dee2e6 !important;">{{ $item->phonen ?? '' }}</td>
                <td style="border: 1px solid #dee2e6 !important;">{{ $item->employee->compensation->salary ?? '$5000' }}</td>
                <td style="border: 1px solid #dee2e6 !important;">
                    {{ $item->employee->date_of_hire->diffForHumans() ?? '' }}
                </td>
                <td style="border: 1px solid #dee2e6 !important;">
                    @if ($item->employee->status ?? '' == 'leave')
                        <span class="status red"></span> {{ $item->employee->status ?? '' }}
                    @endif
                    @if ($item->employee->status ?? '' == null)
                        <span class="status purple"></span> active {{ $item->employee->status ?? '' }}
                    @endif
                </td>
                <td style="border: 1px solid #dee2e6 !important;">
                    {{ $item->employee->departments->first()->full_name ?? '' }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


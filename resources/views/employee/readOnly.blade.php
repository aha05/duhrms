@extends('layouts.layout')
@section('content')
    <?php
    use Carbon\Carbon;
    ?>
    @if (session()->has('error'))
        <script>
            toastr.error('{{ session('error') }}');
        </script>
    @endif
    @if (session()->has('success'))
        <script>
            toastr.success('{{ session('success') }}');
        </script>
    @endif
    <style>
        .icon-button {
            background: none;
            border: none;
            color: #555;
            cursor: pointer;
            font-size: 16px;
            width: 1.9rem;
            padding: 0;
        }

        .image-container {
            position: relative;
            display: inline-block;
        }

        .edit-button {
            position: absolute;
            top: 98px;
            right: 0px;
            left: 10px;
            border-top-left-radius: 100px;
            background-color: rgba(27, 25, 25, 0.7);
            color: white;
            border: none;
            padding: 5px 10px;
            font-size: 14px;
        }
    </style>
    <h2 class="w-100 mb-4 ms-3"> Dashboard>Employee><span class="text-primary">Details</span></h2>
    <div class="container">
        {{-- Employee Details --}}
        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-1">
                        <div class="rounded">
                            <img src="{{ $person->photo ?? ''}}" alt="Image" style="width:6rem; height:8rem;">
                        </div>
                    </div>
                    <div class="col-5 ms-4">
                        <div class="row mt-1">
                            <span class="col-4">Employee ID:</span>
                            <span class="col-7">{{ $employee->emp_id ?? ''}}</span>
                        </div>
                        <div class="row mt-1">
                            <span class="col-4">First Name:</span>
                            <span class="col-7">{{ $person->first_name ?? ''}}</span>
                        </div>
                        <div class="row mt-1">
                            <span class="col-4">Last Name:</span>
                            <span class="col-7">{{ $person->last_name ?? ''}}</span>
                        </div>
                        <div class="row mt-1">
                            <span class="col-4">Date of Brith:</span>
                            <span class="col-6">{{ $person->DOB ?? ''}}</span>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="row mt-1">
                            <span class="col-4">Gender:</span>
                            <span class="col-7">{{ $person->gender ?? ''}}</span>
                        </div>
                        <div class="row mt-1">
                            <span class="col-4">Email:</span>
                            <span class="col-7">{{ $person->email ?? ''}}</span>
                        </div>
                        <div class="row mt-1">
                            <span class="col-4">phone:</span>
                            <span class="col-7">{{ $person->phone ?? ''}}</span>
                        </div>
                        <div class="row mt-1">
                            <span class="col-4">Nationality:</span>
                            <span class="col-7">{{ $person->nationality ?? ''}}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row mb-4 mt-4">
            {{-- Personal Information --}}
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="row mt-2 ms-2">
                        <div class="col-9 text-bold">
                            Personal Information
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-2 row">
                            <span class="col-5 text-bold">Religion:</span>
                            <span class="col-7">{{ $person->region ?? ''}}</span>
                        </div>
                        <div class="mb-2 row">
                            <span class="col-5 text-bold">Marital status:</span>
                            <span class="col-7">{{ $person->marital_status ?? ''}}</span>
                        </div>
                        <div class="mb-2 row">
                            <span class="col-5 text-bold">No. of children:</span>
                            <span class="col-7">{{ $person->NO_of_children ?? ''}}</span>
                        </div>
                        <div class="mb-2 row">
                            <span class="col-5 text-bold">Region:</span>
                            <span class="col-7">{{ $person->region ?? ''}}</span>
                        </div>
                        <div class="mb-2 row">
                            <span class="col-5 text-bold">Zone:</span>
                            <span class="col-7">{{ $person->zone ?? ''}}</span>
                        </div>
                        <div class="mb-2 row">
                            <span class="col-5 text-bold">Woreda:</span>
                            <span class="col-7">{{ $person->woreda ?? ''}}</span>
                        </div>
                        <div class="mb-2 row">
                            <span class="col-5 text-bold">Kebele:</span>
                            <span class="col-7">{{ $person->kebele ?? ''}}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contact Information --}}
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="row mt-2 ms-2">
                        <div class="col-9 text-bold">
                            Emergnecy Contact Information
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <span class="col-5 text-bold">First Name:</span>
                            <span class="col-7">{{ $employee->contactInfo->first()->first_name ?? ''}}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-5 text-bold">Last Name:</span>
                            <span class="col-7">{{ $employee->contactInfo->first()->last_name ?? ''}}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-5 text-bold">Gender:</span>
                            <span class="col-7">{{ $employee->contactInfo->first()->gender ?? ''}}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-5 text-bold">Email:</span>
                            <span class="col-7">{{ $employee->contactInfo->first()->email ?? ''}}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-5 text-bold">Phone:</span>
                            <span class="col-7">{{ $employee->contactInfo->first()->phone ?? ''}}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-5 text-bold">Adderess:</span>
                            <span class="col-7">{{ $employee->contactInfo->first()->address ?? ''}}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-5 text-bold">Relationship:</span>
                            <span class="col-7">{{ $employee->contactInfo->first()->relationship ?? ''}}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Employment Details --}}
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="row mt-2 ms-2">
                        <div class="col-9 text-bold">
                            Employment Details
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <span class="col-5 text-bold">Job title:</span>
                            <span class="col-7">{{ $employee->job_title ?? ''}}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-5 text-bold">Department:</span>
                            <span class="col-7">
                                @if ($employee->departments != null)
                                    {{ $employee->departments->first()->full_name ?? ''}}
                                @endif
                            </span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-5 text-bold">Position:</span>
                            <span class="col-7">{{ $employee->position ?? ''}}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-5 text-bold">Employment type:</span>
                            <span class="col-7">{{ $employee->employment_type ?? ''}}</span>
                        </div>

                        <div class="row mb-2">
                            <span class="col-5 text-bold">Date of hire:</span>
                            <span class="col-7">{{ $employee->date_of_hire ?? ''}}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-5 text-bold">Location:</span>
                            <span class="col-7">{{ $employee->location ?? ''}}</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mb-4 mt-4">
            {{-- Compensation and Benefits  --}}
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="row mt-2 ms-2">
                        <div class="col-9 text-bold">
                            Compensation and Benefits
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-2 row">
                            <span class="col-6 text-bold">Salary:</span>
                            <span class="col-6">{{ $employee->compensation->salary ?? '$00000' }}</span>
                        </div>
                        <div class="mb-2 row">
                            <span class="col-6 text-bold"> Pay frequency:</span>
                            <span class="col-6">{{ $employee->compensation->pay_frequency ?? 'Unknown' }}</span>
                        </div>
                        <div class="mb-2 row">
                            <span class="col-6 text-bold">Overtime rates:</span>
                            <span class="col-6">{{ $employee->compensation->overtime_rate ?? 'Unknown' }}</span>
                        </div>
                        <div class="mb-2 row">
                            <span class="col-6 text-bold">Bonuses:</span>
                            <span class="col-6">{{ $employee->compensation->bonus ?? '$00' }}</span>
                        </div>
                        <div class="mb-2 row">
                            <span class="col-6 text-bold">Healthcare:</span>
                            <span class="col-6">{{ $employee->benefit->healthcare ?? 'Unknown' }}</span>
                        </div>
                        <div class="mb-2 row">
                            <span class="col-6 text-bold">Vacation days:</span>
                            <span class="col-6">{{ $employee->benefit->vacation ?? 'Unknown' }}</span>
                        </div>

                        <div class="mb-2 row">
                            <span class="col-6 text-bold">Retirement plans:</span>
                            <span class="col-6">{{ $employee->benefit->retirement ?? 'Unknown' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Educational Information --}}
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="row mt-2 ms-2">
                        <div class="col-9 text-bold">
                            Educational Information
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="experience-box">
                            <ul class="experience-list">
                                @foreach ($employee->educationalInfo as $edus)
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">

                                            <div class="timeline-content row">
                                                <a href="#/"
                                                    class="name">{{ $edus->institution ?? 'International College of Arts and Science (UG)' }}
                                                </a>
                                                <div>
                                                    {{ $edus->level . ' ' . $edus->field ?? 'Bsc Computer Science' }}
                                                </div>
                                                <span class="time">2000 - 2003</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Employment History --}}
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="row mt-2 ms-1">
                        <div class="col-10 text-bold">
                            Employment History
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="experience-box">
                            <ul class="experience-list">
                                @foreach ($employee->experience as $item)
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content row">
                                                <a href="#/"
                                                    class="name">{{ $item->position . ' at' . ' ' . $item->company ?? 'Web Designer at Ron-tech' }}</a>
                                                <span
                                                    class="time">{{ $item->start_date . ' -' . ' ' . $item->end_date . ' (' }}Jan
                                                    2013 - Present (5 years 2 months)</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4 mt-4">
            {{-- Bank Information  --}}
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="row mt-2 ms-2">
                        <div class="col-9 text-bold">
                            Bank Information
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-2 row">
                            <span class="col-6 text-bold">Full Name:</span>
                            <span class="col-6">{{ $employee->bankInfo->full_name ?? 'Unknown' }}</span>
                        </div>
                        <div class="mb-2 row">
                            <span class="col-6 text-bold">Bank Name:</span>
                            <span class="col-6">{{ $employee->bankInfo->bank_name ?? 'Unknown' }}</span>
                        </div>
                        <div class="mb-2 row">
                            <span class="col-6 text-bold">Account Number:</span>
                            <span class="col-6">{{ $employee->bankInfo->account_number ?? 'Unknown' }}</span>
                        </div>
                        <div class="mb-2 row">
                            <span class="col-6 text-bold">Account Type:</span>
                            <span class="col-6">{{ $employee->bankInfo->account_type ?? 'Unknown' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

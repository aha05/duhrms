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
    <div class="container">
        <div class="row mt-2 ms-5 fs-3">
            Employee Details
        </div>

        {{-- Employee Details --}}
        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-1">
                        <div class="rounded">
                            <form action="{{ route('update.person.photo', $person) }}" enctype="multipart/form-data"
                                method="post" id="myForm">
                                @csrf
                                @method('PUT')
                                <div class="image-container">
                                    <img src="{{ $person->photo }}" alt="Image" style="width:6rem; height:8rem;">
                                    <label class="btn edit-button text-center">
                                        <input type="file" id="photo" name="photo" style="display: none;">Edit
                                        <button type="submit" style="display: none;"></button>
                                    </label>
                                </div>
                                <script>
                                    const photoInput = document.getElementById('photo');
                                    const myForm = document.getElementById('myForm');

                                    photoInput.addEventListener('change', function() {
                                        myForm.submit();
                                    });
                                </script>
                            </form>
                        </div>
                    </div>
                    <div class="col-5 ms-4">
                        <div class="row mt-1">
                            <span class="col-4">Employee ID:</span>
                            <span class="col-7">{{ $employee->emp_id ?? '' }}</span>
                        </div>
                        <div class="row mt-1">
                            <span class="col-4">First Name:</span>
                            <span class="col-7">{{ $person->first_name ?? '' }}</span>
                        </div>
                        <div class="row mt-1">
                            <span class="col-4">Last Name:</span>
                            <span class="col-7">{{ $person->last_name ?? '' }}</span>
                        </div>

                    </div>
                    <div class="col-5">
                        <div class="row mt-1">
                            <span class="col-4">Date of Brith:</span>
                            <span class="col-6">{{ $person->DOB->format('F d, Y') ?? '' }}</span>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                class="btn icon-button bg-light bg-gradient">
                                <i class="fas fa-edit edit-icon"></i>
                            </button>
                        </div>
                        <div class="row mt-1">
                            <span class="col-4">Gender:</span>
                            <span class="col-7">{{ $person->gender ?? '' }}</span>
                        </div>
                        <div class="row mt-1">
                            <span class="col-4">Email:</span>
                            <span class="col-7">{{ $person->email ?? '' }}</span>
                        </div>
                        <div class="row mt-1">
                            <span class="col-4">phone:</span>
                            <span class="col-7">{{ $person->phone ?? '' }}</span>
                        </div>
                        <div class="row mt-1">
                            <span class="col-4">Nationality:</span>
                            <span class="col-7">{{ $person->nationality ?? '' }}</span>
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
                        <div class="col-3">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                class="btn icon-button bg-light bg-gradient">
                                <i class="fas fa-edit edit-icon"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-2 row">
                            <span class="col-5 text-bold">Religion:</span>
                            <span class="col-7">{{ $person->region ?? '' }}</span>
                        </div>
                        <div class="mb-2 row">
                            <span class="col-5 text-bold">Marital status:</span>
                            <span class="col-7">{{ $person->marital_status ?? '' }}</span>
                        </div>
                        <div class="mb-2 row">
                            <span class="col-5 text-bold">No. of children:</span>
                            <span class="col-7">{{ $person->NO_of_children }}</span>
                        </div>
                        <div class="mb-2 row">
                            <span class="col-5 text-bold">Region:</span>
                            <span class="col-7">{{ $person->region ?? '' }}</span>
                        </div>
                        <div class="mb-2 row">
                            <span class="col-5 text-bold">Zone:</span>
                            <span class="col-7">{{ $person->zone ?? '' }}</span>
                        </div>
                        <div class="mb-2 row">
                            <span class="col-5 text-bold">Woreda:</span>
                            <span class="col-7">{{ $person->woreda ?? '' }}</span>
                        </div>
                        <div class="mb-2 row">
                            <span class="col-5 text-bold">Kebele:</span>
                            <span class="col-7">{{ $person->kebele ?? '' }}</span>
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
                        <div class="col-3">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#contactInfo"
                                class="btn icon-button bg-light bg-gradient">
                                <i class="fas fa-edit edit-icon"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <span class="col-5 text-bold">First Name:</span>
                            <span class="col-7">{{ $employee->contactInfo->first()->first_name }}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-5 text-bold">Last Name:</span>
                            <span class="col-7">{{ $employee->contactInfo->first()->last_name ?? '' }}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-5 text-bold">Gender:</span>
                            <span class="col-7">{{ $employee->contactInfo->first()->gender ?? '' }}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-5 text-bold">Email:</span>
                            <span class="col-7">{{ $employee->contactInfo->first()->email ?? '' }}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-5 text-bold">Phone:</span>
                            <span class="col-7">{{ $employee->contactInfo->first()->phone ?? '' }}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-5 text-bold">Adderess:</span>
                            <span class="col-7">{{ $employee->contactInfo->first()->address ?? '' }}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-5 text-bold">Relationship:</span>
                            <span class="col-7">{{ $employee->contactInfo->first()->relationship ?? '' }}</span>
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
                        <div class="col-3">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#employeeEidt"
                                class="btn icon-button bg-light bg-gradient">
                                <i class="fas fa-edit edit-icon"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <span class="col-5 text-bold">Job title:</span>
                            <span class="col-7">{{ $employee->job_title }}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-5 text-bold">Department:</span>
                            <span class="col-7">
                                @if ($employee->departments != null)
                                    {{ $employee->departments->first()->full_name ?? '' }}
                                @endif
                            </span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-5 text-bold">Position:</span>
                            <span class="col-7">{{ $employee->position ?? '' }}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-5 text-bold">Employment type:</span>
                            <span class="col-7">{{ $employee->employment_type ?? '' }}</span>
                        </div>

                        <div class="row mb-2">
                            <span class="col-5 text-bold">Date of hire:</span>
                            <span class="col-7">{{ $employee->date_of_hire ?? '' }}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-5 text-bold">Location:</span>
                            <span class="col-7">{{ $employee->location ?? '' }}</span>
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
                        <div class="col-3">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#comp_benefitsEidt"
                                class="btn icon-button bg-light bg-gradient">
                                <i class="fas fa-edit edit-icon"></i>
                            </button>
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
                        <div class="col-3">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#EducationalInfoAdd"
                                class="btn icon-button bg-light bg-gradient">
                                <i class="fas fa-plus-circle"></i>
                            </button>
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
                                                <div class="col-9">
                                                    <a href="#/"
                                                        class="name">{{ $edus->institution ?? 'International College of Arts and Science (UG)' }}
                                                    </a>
                                                    <div>
                                                        {{ $edus->level . ' ' . $edus->field ?? 'Bsc Computer Science' }}
                                                    </div>
                                                    <span class="time"></span>
                                                </div>
                                                <div class="col-3">
                                                    <a type="button" data-bs-toggle="modal"
                                                        href="{{ route('emp.Edit', $edus) }}"
                                                        data-bs-target="#EducationalInfoEidt"
                                                        class="btn icon-button bg-light bg-gradient">
                                                        <i class="fas fa-edit edit-icon"></i>
                                                    </a>

                                                </div>
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
                        <div class="col-2">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#experienceInfo"
                                class="btn icon-button bg-light bg-gradient">
                                <i class="fas fa-plus-circle"></i>
                            </button>
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
                                                <div class="col-10">
                                                    <a href="#/"
                                                        class="name">{{ $item->position . ' at' . ' ' . $item->company ?? 'Web Designer at Ron-tech' }}</a>
                                                    <span
                                                        class="time">{{ $item->start_date->format('F d, Y') . ' -' . ' ' . $item->end_date->format('F d, Y') }}
                                                        -
                                                        ({{ $item->end_date->diffInYears($item->start_date) . ' Years' }})
                                                    </span>
                                                </div>
                                                <div class="col-2">
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#experienceInfoEdit"
                                                        class="btn icon-button bg-light bg-gradient">
                                                        <i class="fas fa-edit edit-icon"></i>
                                                    </button>
                                                </div>
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
                        <div class="col-3">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#BankInfoEidt"
                                class="btn icon-button bg-light bg-gradient">
                                <i class="fas fa-edit edit-icon"></i>
                            </button>
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



    {{--
    **************************
    **************************
              Modals
    **************************
    **************************
--}}

    <!-- Personal Details Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title ms-4" id="exampleModalLabel">Personal Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('update.person', $person) }}" class="p-5 pt-1" enctype="multipart/form-data"
                        method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-2 col-4 form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" id="first_name" name="first_name"
                                    value="{{ $person->first_name }}" class="form-control" required>
                            </div>
                            <div class="mb-2 col-4 form-group">
                                <label for="middle_name">Middle Name:</label>
                                <input type="text" id="middle_name" name="middle_name"
                                    value="{{ $person->middle_name }}" class="form-control" required>
                            </div>
                            <div class="mb-2 col-4 form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" id="last_name" name="last_name" value="{{ $person->last_name }}"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-6 form-group">
                                <label for="date_of_birth">Date of Birth:</label>
                                <input type="date" id="date_of_birth" name="date_of_birth"
                                    value="{{ $person->DOB }}" class="form-control" required>
                            </div>
                            <div class="mb-2 col-6 form-group">
                                <label for="gender">Gender:</label>
                                <select id="gender" name="gender" class="form-control" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male" {{ __($person->gender) == 'Male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="Female" {{ __($person->gender) == 'Female' ? 'selected' : '' }}>Female
                                    </option>
                                    <option value="Other" {{ __($person->gender) == 'Other' ? 'selected' : '' }}>Other
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-6 form-group">
                                <label for="email">Eamil:</label>
                                <input type="email" id="email" name="email" value="{{ $person->email }}"
                                    class="form-control" required>
                            </div>
                            <div class="mb-2 col-6 form-group">
                                <label for="phone">Phone:</label>
                                <input type="tel" id="phone" name="phone" value="{{ $person->phone }}"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-4 form-group">
                                <label for="NO_of_children">No. of Children:</label>
                                <input type="number" id="NO_of_children" name="NO_of_children"
                                    value="{{ $person->NO_of_children }}" class="form-control" required>
                            </div>
                            <div class="mb-2 col-4 form-group">
                                <label for="religion">Religion:</label>
                                <input type="text" id="religion" name="religion" value="{{ $person->religion }}"
                                    class="form-control" required>
                            </div>
                            <div class="mb-2 col-4 form-group">
                                <label for="marital_status">Martial Status:</label>
                                <select id="marital_status" name="marital_status" class="form-control" required>
                                    <option value="">Select Martial Status</option>
                                    <option value="Single"
                                        {{ __($person->marital_status) == 'Single' ? 'selected' : '' }}>Single</option>
                                    <option value="Married"
                                        {{ __($person->marital_status) == 'Married' ? 'selected' : '' }}>Married</option>
                                    <option value="Other" {{ __($person->marital_status) == 'Other' ? 'selected' : '' }}>
                                        Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-6 form-group">
                                <label for="nationality">Nationality:</label>
                                <input type="text" id="nationality" name="nationality"
                                    value="{{ $person->nationality }}" class="form-control" required>
                            </div>
                            <div class="mb-2 col-6 form-group">
                                <label for="region">Region:</label>
                                <input type="text" id="region" name="region" value="{{ $person->region }}"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" mb-2 col-6 form-group">
                                <label for="zone">Zone:</label>
                                <input type="text" id="zone" name="zone" value="{{ $person->zone }}"
                                    class="form-control" required>
                            </div>
                            <div class="mb-2 col-6 form-group">
                                <label for="woreda">Woreda:</label>
                                <input type="text" id="woreda" name="woreda" value="{{ $person->woreda }}"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <label for="kebele">Kebele:</label>
                                <input type="text" id="kebele" name="kebele" value="{{ $person->kebele }}"
                                    class="form-control" required>
                            </div>
                            <div class="col-6 form-group">
                                <label for="photo">Photo:</label>
                                <input type="file" id="photo" name="photo" value="{{ $person->photo }}"
                                    class="form-control">
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-center border-0 mb-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Contact Information -->
    <div class="modal fade" id="contactInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title ms-4" id="exampleModalLabel">Contact Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('update.contact', $employee->contactInfo->first()) }}" class="p-5 pt-1"
                        method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-2 col-6 form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" id="first_name" name="first_name"
                                    value="{{ $employee->contactInfo->first()->first_name }}" class="form-control"
                                    required>
                            </div>
                            <div class="mb-2 col-6 form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" id="last_name" name="last_name"
                                    value="{{ $employee->contactInfo->first()->last_name }}" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-2 col-6 form-group">
                                <label for="gender">Gender:</label>
                                <select id="gender" name="gender" class="form-control" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male"
                                        {{ __($employee->contactInfo->first()->gender) == 'Male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="Female"
                                        {{ __($employee->contactInfo->first()->gender) == 'Female' ? 'selected' : '' }}>
                                        Female</option>
                                    <option value="Other"
                                        {{ __($employee->contactInfo->first()->gender) == 'Other' ? 'selected' : '' }}>
                                        Other</option>
                                </select>
                            </div>

                            <div class="mb-2 col-6 form-group">
                                <label for="relationship">Relationship:</label>
                                <input type="text" id="relationship" name="relationship"
                                    value="{{ $employee->contactInfo->first()->relationship }}" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="mb-2 form-group">
                            <label for="email">Eamil:</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="{{ $employee->contactInfo->first()->email }}" required>
                        </div>
                        <div class="mb-2 form-group">
                            <label for="phone">Phone:</label>
                            <input type="tel" id="phone" name="phone" class="form-control"
                                value="{{ $employee->contactInfo->first()->phone }}" required>
                        </div>
                        <div class="mb-2 form-group">
                            <label for="address">Address:</label>
                            <input type="text" id="address" name="address" class="form-control"
                                value="{{ $employee->contactInfo->first()->address }}" required>
                        </div>
                </div>
                <div class="modal-footer justify-content-center border-0 mb-2">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Employment Details Edit -->
    <div class="modal fade" id="employeeEidt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg w-50">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title ms-4" id="exampleModalLabel">Employment Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('employee.edit', $employee) }}" class="p-5 pt-1" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="job_title">Job Title:</label>
                                <input type="text" id="name" name="job_title" class="form-control"
                                    value="{{ $employee->job_title }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="department">Department:</label>
                                <select id="department" class="form-control" name="department"
                                    value="@if ($employee->departments->first() != null) {{ $employee->departments->last()->full_name ?? '' }}" @endif autocomplete="department"
                                    required>
                                    <option value="">Select Department</option>
                                    @foreach ($department as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($employee->departments->first() != null) {{ $item->full_name == $employee->departments->last()->full_name ? 'selected' : '' }} @endif>
                                            {{ $item->full_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="position">Position:</label>
                                <input type="tel" id="position" name="position" class="form-control"
                                    value="{{ $employee->position }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date_of_hire">Date of hire:</label>
                                <input type="date" id="date_of_hire" name="date_of_hire" class="form-control"
                                    value="{{ $employee->date_of_hire }}" required>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="employment_type">Employment Type:</label>
                            <select id="employment_type" name="employment_type" class="form-control" required>
                                <option value="">Select Employment Type</option>
                                <option value="Full-time"
                                    {{ $employee->employment_type == 'Full-time' ? 'selected' : '' }}>
                                    Full-time
                                </option>
                                <option value="Part-time"
                                    {{ $employee->employment_type == 'Part-time' ? 'selected' : '' }}>
                                    Part-time
                                </option>
                                <option value="Temporary"
                                    {{ $employee->employment_type == 'Temporary' ? 'selected' : '' }}>
                                    Temporary</option>
                                <option value="Permanent"
                                    {{ $employee->employment_type == 'Permanent' ? 'selected' : '' }}>
                                    Permanent</option>
                            </select>
                        </div>
                        <div class="form-group mb-0">
                            <label for="location">Location:</label>
                            <input type="tel" id="location" name="location" value="{{ $employee->position }}"
                                class="form-control" required>
                        </div>
                </div>
                <div class="modal-footer justify-content-center border-0 mb-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Compensation and Benefits Information Edit -->
    <div class="modal fade" id="comp_benefitsEidt" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title ms-4" id="exampleModalLabel">Compensation and Benefits</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('comp.benefit', $employee) }}" class="p-5 pt-1" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-2 col-md-6 form-group">
                                <label for="salary">Salary:</label>
                                <input type="text" id="salary" name="salary" class="form-control"
                                    value="{{ $employee->compensation->salary ?? 'NULL' }}" required>
                            </div>

                            <div class="mb-2 col-md-6 form-group">
                                <label for="pay_frequency">{{ __('Pay frequency:') }}</label>
                                <select id="pay_frequency" name="pay_frequency" class="form-control">
                                    <option value="">Select Pay frequency</option>
                                    <option value="Daily"
                                        {{ ($employee->compensation->pay_frequency ?? '') == 'Daily' ? 'selected' : '' }}>
                                        Daily
                                    </option>
                                    <option value="Weekly"
                                        {{ ($employee->compensation->pay_frequency ?? '') == 'Weekly' ? 'selected' : '' }}>
                                        Weekly
                                    </option>
                                    <option value="Mothly"
                                        {{ ($employee->compensation->pay_frequency ?? '') == 'Mothly' ? 'selected' : '' }}>
                                        Mothly
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-6 form-group">
                                <label for="overtime_rate">Overtime rates:</label>
                                <input type="text" id="overtime_rate" name="overtime_rate" class="form-control"
                                    value="{{ $employee->compensation->overtime_rate ?? 'NULL' }}" required>
                            </div>
                            <div class="mb-2 col-6 form-group">
                                <label for="bonuses">Bonuses:</label>
                                <input type="text" id="bonus" name="bonus" class="form-control"
                                    value="{{ $employee->compensation->bonus ?? 'NULL' }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-6 form-group">
                                <label for="vacation">Vacation days:</label>
                                <input type="text" id="vacation" name="vacation" class="form-control"
                                    value="{{ $employee->benefit->retirement ?? 'NULL' }}" required>
                            </div>
                            <div class="mb-2 col-md-6 form-group">
                                <label for="retirement">Retirement plans:</label>
                                <input type="text" id="retirement" name="retirement" class="form-control"
                                    value="{{ $employee->benefit->retirement ?? 'NULL' }}" required>
                            </div>
                        </div>
                        <div class="mb-2  form-group">
                            <label for="healthcare">Healthcare:</label>
                            <input type="text" id="healthcare" name="healthcare" class="form-control"
                                value="{{ $employee->benefit->retirement ?? 'NULL' }}" required>
                        </div>
                </div>

                <div class="modal-footer justify-content-center border-0 mb-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Educational Information add -->
    <div class="modal fade" id="EducationalInfoAdd" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title ms-4" id="exampleModalLabel">Eucational Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('add.education', $employee) }}" class="p-5 pt-1" method="post">
                        @csrf
                        <div class="mb-2 form-group">
                            <label for="institution">University/College:</label>
                            <input type="text" id="institution" name="institution" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-6 form-group">
                                <label for="field">Field:</label>
                                <input type="text" id="field" name="field" class="form-control" required>
                            </div>
                            <div class="mb-2 col-md-6 form-group">
                                <label for="level">{{ __('Level:') }}</label>
                                <select id="level" name="level" class="form-control" required>
                                    <option value="">Select Level</option>
                                    <option value="Msc." {{ old('level') == 'Msc.' ? 'selected' : '' }}>Msc.</option>
                                    <option value="Phd." {{ old('level') == 'Phd.' ? 'selected' : '' }}>Phd.</option>
                                    <option value="Bsc." {{ old('level') == 'Bsc.' ? 'selected' : '' }}>Bsc.</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-2 col-md-6 form-group">
                                <label for="graduation">Year of Graduation:</label>
                                <input type="number" id="graduation" name="graduation" class="form-control" required>
                            </div>
                            <div class="mb-2 col-md-6 form-group">
                                <label for="GPA">GPA:</label>
                                <input type="text" id="GPA" name="GPA" class="form-control" required>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-center border-0 mb-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Experience Information Add -->
    <div class="modal fade" id="experienceInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title ms-4" id="exampleModalLabel">Experience Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('experience.add', $employee) }}" class="p-5 pt-1" method="post">
                        @csrf
                        <div class="row">
                            <div class="mb-2 col-6 form-group">
                                <label for="company">Company:</label>
                                <input type="text" id="company" name="company" class="form-control" required>
                            </div>
                            <div class="mb-2 col-6 form-group">
                                <label for="position">Position:</label>
                                <input type="text" id="position" name="position" class="form-control" required>
                            </div>

                        </div>
                        <div class="row">
                            <div class="mb-2 col-6 form-group">
                                <label for="start_date">Start Date:</label>
                                <input type="date" id="start_date" name="start_date" class="form-control" required>
                            </div>
                            <div class="mb-2 col-6 form-group">
                                <label for="end_date">End Date:</label>
                                <input type="date" id="end_date" name="end_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-2 form-group">
                            <label for="description">Description:</label>
                            <textarea type="email" id="description" name="description" class="form-control" rows="3"></textarea>
                        </div>

                </div>
                <div class="modal-footer justify-content-center border-0 mb-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bank Information Edit -->
    <div class="modal fade" id="BankInfoEidt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg w-50">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title ms-4" id="exampleModalLabel">Bank Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('bank.edit', $employee) }}" class="p-5 pt-1" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="full_name">Full Name:</label>
                            <input type="text" id="full_name" name="full_name"
                                value="{{ $employee->bankInfo->full_name }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="bankName">Bank Name:</label>
                            <input type="text" id="bankName" name="bank_name"
                                value="{{ $employee->bankInfo->bank_name }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="accountNumber">Account Number:</label>
                            <input type="tel" id="accountNumber" name="account_number"
                                value="{{ $employee->bankInfo->account_number }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="accountType">Account Type:</label>
                            <select id="accountType" name="account_type" class="form-control" required>
                                <option value="">Select Account Type</option>
                                <option value="Checking"
                                    {{ $employee->bankInfo->account_type == 'Checking' ? 'selected' : '' }}>Checking
                                </option>
                                <option value="Savings"
                                    {{ $employee->bankInfo->account_type == 'Savings' ? 'selected' : '' }}>Savings
                                </option>
                                <option value="Other"
                                    {{ $employee->bankInfo->account_type == 'Other' ? 'selected' : '' }}>Other</option>

                            </select>
                        </div>
                </div>
                <div class="modal-footer justify-content-center border-0 mb-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Educational Information Edit -->
    <div class="modal fade" id="EducationalInfoEidt" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg " style="height: 15rem;">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h4 class="modal-title text-bold ms-4" id="exampleModalLabel">Eucational Information</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body overflow-y">

                    @foreach ($employee->educationalInfo as $edu_info)
                        <hr>
                        <h5 class="text-center text-primary"> <span>Eucational Information</span></h5>
                        <form action="{{ route('update.education', $employee->id) }}" class="p-5 pt-1" method="post">
                            @csrf
                            @method('PUT')
                            <input type="text" name="edu_id" value="{{ $edu_info->id }}" style="display: none">
                            <div class="mb-2 form-group">
                                <label for="institution">University/College:</label>
                                <input type="text" id="institution" name="institution" class="form-control"
                                    value="{{ $edu_info->institution }}" required>
                            </div>
                            <div class="row">
                                <div class="mb-2 col-md-6 form-group">
                                    <label for="field">Field:</label>
                                    <input type="text" id="field" name="field" class="form-control"
                                        value="{{ $edu_info->field }}" required>
                                </div>
                                <div class="mb-2 col-md-6 form-group">
                                    <label for="level">{{ __('Level:') }}</label>
                                    <select id="level" name="level" class="form-control" required>
                                        <option value="">Select Level</option>
                                        <option value="Msc." {{ $edu_info->level == 'Msc.' ? 'selected' : '' }}>Msc.
                                        </option>
                                        <option value="Phd." {{ $edu_info->level == 'Phd.' ? 'selected' : '' }}>Phd.
                                        </option>
                                        <option value="Bsc." {{ $edu_info->level == 'Bsc.' ? 'selected' : '' }}>Bsc.
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-2 col-md-6 form-group">
                                    <label for="year_of_graduation">Year of Graduation:</label>
                                    <input type="number" id="year_of_graduation" name="year_of_graduation"
                                        class="form-control" value="{{ $edu_info->year_of_graduation }}" required>
                                </div>
                                <div class="mb-2 col-md-6 form-group">
                                    <label for="GPA">GPA:</label>
                                    <input type="text" id="GPA" name="GPA" class="form-control"
                                        value="{{ $edu_info->GPA }}" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="mt-5 btn btn-primary">Update</button>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Experience Information Edit -->
    <div class="modal fade" id="experienceInfoEdit" tabindex="-1" aria-labelledby="experienceInfoEdit"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title ms-4" id="experienceInfoEdit">Experience Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach ($employee->experience as $experience)
                        <form action="{{ route('experience.edit', $employee->id) }}" class="p-5 pt-1" method="post">
                            @csrf
                            <input type="text" name="exp_id" value="{{ $experience->id }}" style="display: none">
                            <div class="row">
                                <div class="mb-2 col-6 form-group">
                                    <label for="company">Company:</label>
                                    <input type="text" id="company" name="company" class="form-control" value="{{ $experience->company }}"
                                        required>
                                </div>
                                <div class="mb-2 col-6 form-group">
                                    <label for="position">Position:</label>
                                    <input type="text" id="position" name="position" class="form-control" value="{{ $experience->position }}"
                                     required>
                                </div>

                            </div>
                            <div class="row">
                                <div class="mb-2 col-6 form-group">
                                    <label for="start_date">Start Date:</label>
                                    <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $experience->start_date->format('Y-m-d') }}"
                                        required>
                                </div>
                                <div class="mb-2 col-6 form-group">
                                    <label for="end_date">End Date:</label>
                                    <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $experience->end_date->format('Y-m-d') }}"
                                    required>
                                </div>
                            </div>
                            <div class="mb-2 form-group">
                                <label for="description">Description:</label>
                                <textarea type="email" id="description" name="description" class="form-control" rows="3">{{ $experience->description }}</textarea>
                            </div>
                            <div class="text-center p-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

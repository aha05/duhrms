@extends('layouts.layout')
@section('content')
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
    <div class="container mt-4">
        <h2>Employee Registration Form</h2>
        <form action="{{ route('register.employee') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="row">
                    <div class="image d-flex flex-column col-md-6" style="width: 6rem; ">
                        <span class="nam mt-3 text-bold text-dark">{{ __('Photo') }}</span>
                        <button class="btn btn-secondary">
                            <img src="#" style="height: 3rem;" width="50" />
                        </button>
                    </div>
                    <div class="form-group col-md-6 mt-4">
                        <label for="photo">{{ __('Choose Photo') }}</label>
                        <input id="photo" type="file" class="form-control w-50 @error('photo') is-invalid @enderror"
                            name="photo" value="{{ old('photo') }}">

                        @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8 row">
                    <h3>Personal Details</h3>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="first_name">{{ __('First Name:') }}</label>
                            <input id="first_name" type="text"
                                class="form-control  @error('first_name') is-invalid @enderror" name="first_name"
                                autocomplete="first_name" autofocus value="{{ old('first_name') }}">

                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="middle_name">{{ __('Middle Name:') }}</label>
                            <input id="middle_name" type="text"
                                class="form-control  @error('middle_name') is-invalid @enderror" name="middle_name"
                                autocomplete="middle_name" autofocus value="{{ old('middle_name') }}">

                            @error('middle_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="last_name">{{ __('Last Name:') }}</label>
                            <input id="last_name" type="text"
                                class="form-control  @error('last_name') is-invalid @enderror" name="last_name"
                                autocomplete="last_name" autofocus value="{{ old('last_name') }}">

                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="date_of_birth">{{ __('Date of Birth:') }}</label>
                            <input id="date_of_birth" type="date"
                                class="form-control  @error('date_of_birth') is-invalid @enderror" name="date_of_birth"
                                autocomplete="date_of_birth" autofocus value="{{ old('date_of_birth') }}">

                            @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="gender">{{ __('Gender:') }}</label>
                            <select id="gender" name="gender"
                                class="form-control  @error('gender') is-invalid @enderror">
                                <option value="">Select Gender</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('Email:') }}</label>
                            <input id="email" type="text" class="form-control  @error('email') is-invalid @enderror"
                                name="email" autocomplete="email" autofocus value="{{ old('email') }}">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">{{ __('Phone:') }}</label>
                            <input id="phone" type="text" class="form-control  @error('phone') is-invalid @enderror"
                                name="phone" autocomplete="phone" autofocus value="{{ old('phone') }}">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="religion">{{ __('Religion') }}</label>

                            <input id="religion" type="text"
                                class="form-control @error('religion') is-invalid @enderror" name="religion" required
                                autocomplete="religion" value="{{ old('religion') }}">

                            @error('religion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="marital_status">{{ __('Marital Status') }}</label>
                            <select id="marital_status" name="marital_status"
                                class="form-control  @error('marital_status') is-invalid @enderror">
                                <option value="">Marital Status</option>
                                <option value="Single" {{ old('marital_status') == 'Single' ? 'selected' : '' }}>Single
                                </option>
                                <option value="Married" {{ old('marital_status') == 'Married' ? 'selected' : '' }}>Married
                                </option>
                                <option value="other" {{ old('marital_status') == 'other' ? 'selected' : '' }}>Other
                                </option>
                            </select>

                            @error('marital_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="NO_of_children">{{ __('NO. of Children') }}</label>

                            <input id="NO_of_children" type="text"
                                class="form-control @error('NO_of_children') is-invalid @enderror" name="NO_of_children"
                                required autocomplete="NO_of_children" value="{{ old('NO_of_children') }}">

                            @error('NO_of_children')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nationality">{{ __('Nationality') }}</label>

                            <input id="nationality" type="text"
                                class="form-control @error('nationality') is-invalid @enderror" name="nationality"
                                required autocomplete="nationality" value="{{ old('nationality') }}">

                            @error('nationality')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="region">{{ __('Region') }}</label>
                            <input id="region" type="text"
                                class="form-control @error('region') is-invalid @enderror" name="region" required
                                autocomplete="region" autofocus value="{{ old('region') }}">

                            @error('region')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="zone">{{ __('Zone') }}</label>
                            <input id="zone" type="text"
                                class="form-control @error('zone') is-invalid @enderror" name="zone" required
                                autocomplete="zone" autofocus value="{{ old('zone') }}">

                            @error('zone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="woreda">{{ __('Woreda') }}</label>
                            <input id="woreda" type="text"
                                class="form-control @error('woreda') is-invalid @enderror" name="woreda" required
                                autocomplete="current-password" value="{{ old('woreda') }}">

                            @error('woreda')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kebele">{{ __('Kebele') }}</label>
                            <input id="kebele" type="text"
                                class="form-control @error('kebele') is-invalid @enderror" name="kebele" required
                                autocomplete="kebele" value="{{ old('kebele') }}">

                            @error('kebele')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                </div>

                <div class="col-md-4">
                    <h3>Contact Information</h3>

                    <div class="form-group">
                        <label for="con_first_name">{{ __('First name:') }}</label>
                        <input id="con_first_name" type="text"
                            class="form-control  @error('con_first_name') is-invalid @enderror" name="con_first_name"
                            autocomplete="con_first_name" autofocus value="{{ old('con_first_name') }}">

                        @error('con_first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="con_last_name">{{ __('Last name:') }}</label>
                        <input id="con_last_name" type="text"
                            class="form-control  @error('con_last_name') is-invalid @enderror" name="con_last_name"
                            autocomplete="con_last_name" autofocus value="{{ old('con_last_name') }}">

                        @error('con_last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="con_gender">{{ __('Gender:') }}</label>
                        <select id="con_gender" name="con_gender"
                            class="form-control  @error('con_gender') is-invalid @enderror">
                            <option value="">Select Gender</option>
                            <option value="Male" {{ old('con_gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('con_gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ old('con_gender') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>

                        @error('con_gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="con_email">{{ __('Email:') }}</label>
                        <input type="email" id="con_email"
                            class="form-control @error('con_email') is-invalid @enderror" name="con_email"
                            autocomplete="con_last_name" autofocus value="{{ old('con_emial') }}">

                        @error('con_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="con_phone">{{ __('Phone:') }}</label>
                        <input type="tel" id="con_phone"
                            class="form-control @error('con_phone') is-invalid @enderror" name="con_phone"
                            autocomplete="con_phone" autofocus value="{{ old('con_phone') }}">

                        @error('con_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">{{ __('Address:') }}</label>
                        <input type="text" id="address" class="form-control @error('address') is-invalid @enderror"
                            name="address" autocomplete="address" autofocus value="{{ old('address') }}">

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="relationship">{{ __('Relationship:') }}</label>
                        <input type="text" id="relationship"
                            class="form-control @error('relationship') is-invalid @enderror" name="relationship"
                            autocomplete="relationship" autofocus value="{{ old('relationship') }}">

                        @error('relationship')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h3>Employement Information</h3>
                    <div class="form-group">
                        <label for="job_title">{{ __('Job Title') }}:</label>
                        <input type="text" id="job_title"
                            class="form-control @error('job_title') is-invalid @enderror" name="job_title"
                            autocomplete="job_title" autofocus value="{{ old('job_title') }}">

                        @error('job_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="department">{{ __('Department') }}:</label>
                        <select id="department" class="form-control @error('department') is-invalid @enderror"
                            name="department" value="{{ old('department') }}" autocomplete="department" required>
                            <option value="">Select Department</option>
                            @foreach ($department as $item)
                                <option value="{{ $item->id }}" {{ $item->full_name == 'Msc.' ? 'selected' : '' }}>
                                    {{ $item->full_name }}
                                </option>
                            @endforeach
                        </select>

                        @error('department')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="position">{{ __('Position') }}:</label>
                        <input type="text" id="position"
                            class="form-control @error('position') is-invalid @enderror" name="position"
                            autocomplete="position" autofocus value="{{ old('position') }}">

                        @error('position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="employment_type">{{ __('Employment Type') }}:</label>
                        <select id="employment_type" name="employment_type"
                            class="form-control @error('employment_type') is-invalid @enderror">
                            <option value="">Select Employment Type</option>
                            <option value="Full-time" {{ old('employment_type') == 'Full-time' ? 'selected' : '' }}>
                                Full-time
                            </option>
                            <option value="Part-time" {{ old('employment_type') == 'Part-time' ? 'selected' : '' }}>
                                Part-time
                            </option>
                            <option value="Temporary" {{ old('employment_type') == 'Temporary' ? 'selected' : '' }}>
                                Temporary</option>
                            <option value="Permanent" {{ old('employment_type') == 'Permanent' ? 'selected' : '' }}>
                                Permanent</option>
                        </select>

                        @error('employment_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date_of_hire">{{ __('Date of Hire') }}:</label>
                        <input type="date" id="date_of_hire"
                            class="form-control @error('date_of_hire') is-invalid @enderror" name="date_of_hire"
                            autocomplete="date_of_hire" autofocus value="{{ old('date_of_hire') }}">

                        @error('date_of_hire')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="location">{{ __('Location') }}:</label>
                        <input type="text" id="location"
                            class="form-control @error('location') is-invalid @enderror" name="location"
                            autocomplete="location" autofocus value="{{ old('location') }}">

                        @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <div class="col-md-4">
                    <h3>Educational Information</h3>
                    <div class="form-group">
                        <label for="institution">{{ __('University/Collage') }}:</label>
                        <input type="tel" id="institution"
                            class="form-control @error('institution') is-invalid @enderror" name="institution"
                            autocomplete="institution" autofocus value="{{ old('institution') }}">

                        @error('institution')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="field">{{ __('Field') }}:</label>
                        <input type="text" id="field" class="form-control @error('field') is-invalid @enderror"
                            name="field" autocomplete="field" autofocus value="{{ old('field') }}">

                        @error('field')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="level">{{ __('Level:') }}</label>
                        <select id="level" name="level"
                            class="form-control  @error('level') is-invalid @enderror">
                            <option value="">Select Level</option>
                            <option value="Msc." {{ old('level') == 'Msc.' ? 'selected' : '' }}>Msc.</option>
                            <option value="Phd." {{ old('level') == 'Phd.' ? 'selected' : '' }}>Phd.</option>
                            <option value="Bsc." {{ old('level') == 'Bsc.' ? 'selected' : '' }}>Bsc.</option>
                        </select>

                        @error('level')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="graduation">{{ __('Year of Graduation') }}:</label>
                        <input type="text" id="graduation"
                            class="form-control @error('graduation') is-invalid @enderror" name="graduation"
                            autocomplete="graduation" autofocus value="{{ old('graduation') }}">

                        @error('graduation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gpa">{{ __('GPA') }}:</label>
                        <input type="text" id="gpa" class="form-control @error('gpa') is-invalid @enderror"
                            name="gpa" autocomplete="gpa" autofocus value="{{ old('gpa') }}">

                        @error('gpa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <h3>Bank Information</h3>
                    <div class="form-group">
                        <label for="full_name">{{ __('Full Name') }}:</label>
                        <input type="text" id="full_name"
                            class="form-control @error('full_name') is-invalid @enderror" name="full_name"
                            autocomplete="full_name" autofocus value="{{ old('full_name') }}">

                        @error('full_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="bank_name">{{ __('Bank Name') }}:</label>
                        <input type="text" id="bank_name"
                            class="form-control @error('bank_name') is-invalid @enderror" name="bank_name"
                            autocomplete="bank_name" autofocus value="{{ old('bank_name') }}">

                        @error('bank_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="account_number">{{ __('Account Number') }}:</label>
                        <input type="text" id="account_number"
                            class="form-control @error('account_number') is-invalid @enderror" name="account_number"
                            autocomplete="account_number" autofocus value="{{ old('account_number') }}">

                        @error('account_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="account_type">{{ __('Account Type') }}:</label>
                        <select id="account_type" name="account_type"
                            class="form-control @error('account_type') is-invalid @enderror">
                            <option value="">Select Account Type</option>
                            <option value="checking" {{ old('account_type') == 'checking' ? 'selected' : '' }}>Checking
                            </option>
                            <option value="savings" {{ old('account_type') == 'savings' ? 'selected' : '' }}>Savings
                            </option>
                            <option value="other" {{ old('account_type') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>

                        @error('account_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <h3>Employment History</h3>
            <div class="form-group">
                <label for="company">{{ __('Company') }}:</label>
                <input type="text" id="company" class="form-control @error('company') is-invalid @enderror"
                    name="company" autocomplete="company" autofocus value="{{ old('company') }}">

                @error('company')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="position">{{ __('Position') }}:</label>
                <input type="text" id="position" class="form-control @error('position') is-invalid @enderror"
                    name="position" autocomplete="position" autofocus value="{{ old('position') }}">

                @error('position')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="start_date">{{ __('Start Date') }}:</label>
                <input type="date" id="start_date" class="form-control @error('start_date') is-invalid @enderror"
                    name="start_date" autocomplete="start_date" autofocus value="{{ old('start_date') }}">

                @error('start_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="end_date">{{ __('End Date') }}:</label>
                <input type="date" id="end_date" class="form-control @error('end_date') is-invalid @enderror"
                    name="end_date" autocomplete="end_date" autofocus value="{{ old('end_date') }}">

                @error('end_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">{{ __('Description') }}:</label>
                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                    rows="4">{{ old('description') }}</textarea>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection

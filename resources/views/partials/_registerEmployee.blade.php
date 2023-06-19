@if (session()->has('error'))
<script>
    toastr.info('{{ session('error') }}');
</script>
@endif
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalToggleLabel">Register Employee Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('employee.register') }}">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="row mb-2">
                                <label for="first_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                                <div class="col-md-7">
                                    <input id="first_name" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                        required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="middle_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Middle Name') }}</label>

                                <div class="col-md-7">
                                    <input id="middle_name" type="text"
                                        class="form-control @error('middle_name') is-invalid @enderror"
                                        name="middle_name" required autocomplete="middle_name" autofocus>

                                    @error('middle_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="last_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                                <div class="col-md-7">
                                    <input id="last_name" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                        required autocomplete="last_name" autofocus>

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                <div class="col-md-7">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="sex"
                                    class="col-md-4 col-form-label text-md-end">{{ __('sex') }}</label>

                                <div class="col-md-7">
                                    <input id="sex" type="text"
                                        class="form-control @error('sex') is-invalid @enderror" name="sex" required
                                        autocomplete="sex">

                                    @error('sex')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="DOB"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Birthdate') }}</label>

                                <div class="col-md-7">
                                    <input id="DOB" type="date"
                                        class="form-control @error('DOB') is-invalid @enderror" name="DOB" required
                                        autocomplete="DOB">

                                    @error('DOB')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                                <div class="col-md-7">
                                    <input id="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        required autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="nationality"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nationality') }}</label>

                                <div class="col-md-7">
                                    <input id="nationality" type="text"
                                        class="form-control @error('nationality') is-invalid @enderror"
                                        name="nationality" required autocomplete="nationality">

                                    @error('nationality')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="region"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Region') }}</label>

                                <div class="col-md-7">
                                    <input id="region" type="text"
                                        class="form-control @error('region') is-invalid @enderror" name="region"
                                        required autocomplete="region" autofocus>

                                    @error('region')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="row mb-2">
                                <label for="zone"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Zone') }}</label>

                                <div class="col-md-7">
                                    <input id="zone" type="text"
                                        class="form-control @error('zone') is-invalid @enderror" name="zone"
                                        required autocomplete="zone" autofocus>

                                    @error('zone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="woreda"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Woreda') }}</label>

                                <div class="col-md-7">
                                    <input id="woreda" type="text"
                                        class="form-control @error('woreda') is-invalid @enderror" name="woreda"
                                        required autocomplete="current-password">

                                    @error('woreda')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="kebele"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Kebele') }}</label>

                                <div class="col-md-7">
                                    <input id="kebele" type=""
                                        class="form-control @error('kebele') is-invalid @enderror" name="kebele"
                                        required autocomplete="kebele">

                                    @error('kebele')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <label for="contact_person"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Contact Person') }}</label>

                                <div class="col-md-7">
                                    <input id="kebele" type=""
                                        class="form-control @error('contact_person') is-invalid @enderror"
                                        name="contact_person" required autocomplete="contact_person">

                                    @error('contact_person')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <label for="contact_person_phone"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Contact Person Phone') }}</label>

                                <div class="col-md-7">
                                    <input id="contact_person_phone" type="text"
                                        class="form-control @error('contact_person_phone') is-invalid @enderror"
                                        name="contact_person_phone" required autocomplete="contact_person_phone">

                                    @error('contact_person_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <label for="educational_level"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Educationa Level') }}</label>

                                <div class="col-md-7">
                                    <input id="educational_level" type="text"
                                        class="form-control @error('educational_level') is-invalid @enderror"
                                        name="educational_level" required autocomplete="educational_level">

                                    @error('educational_level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="experience"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Experience') }}</label>

                                <div class="col-md-7">
                                    <input id="experience" type="text"
                                        class="form-control @error('experience') is-invalid @enderror"
                                        name="experience" required autocomplete="experience">

                                    @error('experience')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="reset" class="btn btn-secondary"
                     value="Cancel" data-bs-dismiss="modal" aria-label="Close"/>
                <button type="submit" class="btn btn-primary" data-bs-target="#exampleModalToggle2"
                    data-bs-toggle="modal">
                    {{ __('Register') }}
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

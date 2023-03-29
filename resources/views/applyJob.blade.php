@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @if (session()->has('error'))
        <script>
            toastr.success('{{ session('error') }}');
        </script>
    @endif
    @if (session()->has('success'))
        <script>
            toastr.success('{{ session('success') }}');
        </script>
    @endif
    <div class="container " id="one">
        <div class="row justify-content-center ">
            <div class="col-md-8">
                <div class="card h-75">
                    <div class="card-header overflow-auto">{{ __('Apply Job') }}</div>

                    <div class="card-body  overflow-auto">
                        <form method="POST" action="{{ route('applyjob') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="first_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                        value="{{ old('first_name') }}" autocomplete="first_name" autofocus>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="last_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                        value="{{ old('last_name') }}" autocomplete="last_name" autofocus>

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="age"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Age') }}</label>

                                <div class="col-md-6">
                                    <input id="age" type="text"
                                        class="form-control @error('age') is-invalid @enderror" name="age"
                                        value="{{ old('age') }}" autocomplete="age" autofocus>

                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="sex"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Sex') }}</label>

                                <div class="col-md-6">
                                    <input id="sex" type="text"
                                        class="form-control @error('sex') is-invalid @enderror" name="sex"
                                        value="{{ old('sex') }}" autocomplete="sex" autofocus>

                                    @error('sex')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="GPA"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" autocomplete="phone" autofocus>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="level"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Level') }}</label>

                                <div class="col-md-6">
                                    <input id="level" type="text"
                                        class="form-control @error('level') is-invalid @enderror" name="level"
                                        value="{{ old('level') }}" autocomplete="level" autofocus>

                                    @error('level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="GPA"
                                    class="col-md-4 col-form-label text-md-end">{{ __('GPA') }}</label>

                                <div class="col-md-6">
                                    <input id="GPA" type="text"
                                        class="form-control @error('GPA') is-invalid @enderror" name="GPA"
                                        value="{{ old('GPA') }}" autocomplete="first_name" autofocus>

                                    @error('GPA')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="attachment"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Attachment') }}</label>

                                <div class="col-md-6">
                                    <input id="attachment" type="file"
                                        class="form-control @error('attachment') is-invalid @enderror" name="attachment"
                                        value="{{ old('attachment') }}" autocomplete="attachment" autofocus>

                                    @error('attachment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="numberofdoc"
                                    class="col-md-4 col-form-label text-md-end">{{ __('No. Docs') }}</label>

                                <div class="col-md-6">
                                    <input id="numberofdoc" type="number"
                                        class="form-control @error('numberofdoc') is-invalid @enderror" name="numberofdoc"
                                        value="{{ old('numberofdoc') }}" autocomplete="numberofdoc" autofocus>

                                    @error('numberofdoc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="remark"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Remark') }}</label>

                                <div class="col-md-6">
                                    <input id="remark" type="text"
                                        class="form-control @error('remark') is-invalid @enderror" name="remark"
                                        value="{{ old('remark') }}" autocomplete="remark" autofocus>

                                    @error('remark')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button onclick="loadDoc()" type="submit" class="btn btn-primary">
                                        {{ __('Apply') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function loadDoc() {
            document.getElementById("demo").style.visibility = 'visible';
            document.getElementById("one").style.visibility = 'hidden';
            const xhttp =
                new XMLHttpRequest(); //! A browser built-in XMLHttpRequest object (to request data from a web server).
            xhttp.onreadystatechange = function() {
                // A callback function is a function passed as a parameter to another function.
                if (this.readyState == 4 && this.status == 200) {

                    document.getElementById("one").style.visibility = 'visible';
                    document.getElementById("demo").style.visibility = 'hidden';
                }
            };
            xhttp.open("POST", "{{ route('applyjob') }}");
            xhttp.send();
        }
    </script>
    <section id="demo" style="visibility: hidden;">
        <div class="spinner spinner--steps icon-spinner" aria-hidden="true"></div>
    </section>
@endsection

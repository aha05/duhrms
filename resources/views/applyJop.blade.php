@extends('layouts.app')

@section('content')
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script>
        toastr.success('Successfuly Applied!');
</script>
<style>
    .loading {
	z-index: 20;
	position: absolute;
	top: 0;
	left:-5px;
	width: 100%;
	height: 100%;
    background-color: rgba(0,0,0,0.4);
}
.loading-content {
	position: absolute;
	border: 16px solid #f3f3f3; /* Light grey */
	border-top: 16px solid #3498db; /* Blue */
	border-radius: 50%;
	width: 50px;
	height: 50px;
	top: 40%;
	left:35%;
	animation: spin 2s linear infinite;
	}

	@keyframes spin {
		0% { transform: rotate(0deg); }
		100% { transform: rotate(360deg); }
	}
</style>
<section id="loading">
    <div id="loading-content"></div>
</section>

<script>
 $(document).ajaxStart(function() {
        $('#loading').addClass('loading');
        $('#loading-content').addClass('loading-content');
    });


</script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Apply Job') }}</div>

                    <div class="card-body overflow-auto">
                        <form method="POST" action="{{ route('applyjob') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="first_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                        value="{{ old('first_name') }}"  autocomplete="first_name" autofocus>

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
                                        value="{{ old('last_name') }}"  autocomplete="last_name" autofocus>

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
                                        value="{{ old('email') }}"  autocomplete="email" autofocus>

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
                                        value="{{ old('age') }}"  autocomplete="age" autofocus>

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
                                        value="{{ old('sex') }}"  autocomplete="sex" autofocus>

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
                                        value="{{ old('phone') }}"  autocomplete="phone" autofocus>

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
                                        value="{{ old('level') }}"  autocomplete="level" autofocus>

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
                                        value="{{ old('GPA') }}"  autocomplete="first_name" autofocus>

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
                                        value="{{ old('attachment') }}"  autocomplete="attachment" autofocus>

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
                                        value="{{ old('numberofdoc') }}"  autocomplete="numberofdoc" autofocus>

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
                                        value="{{ old('remark') }}"  autocomplete="remark" autofocus>

                                    @error('remark')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Apply') }}
                                    </button>

                                </div>

                            </div>
                            <div class="row mb-3">
                                @if ($errors->any())
                                    <div class="col-md-6">
                                        @foreach ($errors as $er)
                                            <div class="alert alert-danger">{{ $er }}</div>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="ms-5 mt-4 col-md-6 ffset-md-4">
                                    @if (session()->has('error'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                    @endif
                                    @if (session()->has('success'))
                                        <div class="alert alert-success">{{ session('error') }}</div>
                                    @endif
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>





@endsection

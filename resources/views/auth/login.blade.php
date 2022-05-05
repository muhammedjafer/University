@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" >
        <div class="col-md-8">
            <div class="card" style="background-color: rgb(90, 90, 90); color: white;">
                <div class="card-header" dir="rtl"><span class="span">داخل بوون</span></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mb-3" dir="rtl">
                            <label for="email" class="col-md-4 col-form-label text-md-end" style="margin-left: -22px"><span class="span">ئیمێڵ</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3" dir="rtl">
                            <label for="password" class="col-md-4 col-form-label text-md-end" style="margin-left: -22px"><span class="span">ژمارەی نهێنی</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-1">
                                <button type="submit" class="btn btn-primary">
                                    <span class="span">داخل بوون</span>
                                </button>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

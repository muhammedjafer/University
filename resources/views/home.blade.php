@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" dir="rtl" style="background-color: rgb(90, 90, 90); color: white;">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <span class="span">تۆ داخل کراویت</span>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
